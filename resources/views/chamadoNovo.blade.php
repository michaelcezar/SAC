@extends('layout')

@section('pageTitle') Novo Chamado @stop

@section('pageContent')
	<div class="row">
		<div class="col-sm-12">
			<div class="card fat">
				<div class="card-header">
				    Novo Chamado
				</div>
				<div class="card-body">
					<form id='formChamado' class='form'>
						<div class="form-row">
							<div class="form-group col-md-2">
						      <label for="pedido">Pedido N°</label>
						      <input type="number" class="form-control" id="pedido" placeholder="Pedido Nº" autocomplete="off" autofocus required data-error="Digite o n° do pedido">
						      <div class="help-block with-errors"></div>
						    </div>
							<div class="form-group col-md-3">
						      <label for="nome">Cliente</label>
						      <input type="text" class="form-control " id="nome" autocomplete="off" required data-error="Digite o nome do usuário" disabled>
						      <div class="help-block with-errors"></div>
						    </div>
						    <div class="form-group col-md-4">
						      <label for="e-mail">E-Mail</label>
						      <input type="email" class="form-control" id="email" autocomplete="off" required data-error="Digite um e-mail válido">
						      <div class="help-block with-errors"></div>
						    </div>
						    <div class="form-group col-md-3">
						      <label for="titulo">Título</label>
						      <input type="text" class="form-control" id="titulo" autocomplete="off" required data-error="Digite o título do chamado">
						      <div class="help-block with-errors"></div>
						    </div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
						      <label for="observacoes">Observação</label>
						      <textarea class="form-control" id="observacoes" rows="3" required data-error="Digite as observações do chamado"></textarea>
						      <div class="help-block with-errors"></div>
						    </div>
						</div>
						<hr>
						<div class="form-row">
							<div class="form-group col-md-2">
								<button type="button" class="btn btn-outline-success col-md-12" id="btnCad">Cadastrar Chamado</button>
							</div>
							<div class="form-group col-md-2">
								<button type="button" class="btn btn-outline-danger col-md-12" id="btnFormCancel">Cancelar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop

@section('extraJavaScript')
	<script type="text/javascript">
		jQuery(document).ready(function(){
			$("#chamados").addClass("active");

			$("#btnFormCancel").click(function(e){
				e.preventDefault();
				$(location).attr('href', '../../');
    		});

			$("#pedido").blur(function(){
				if ($('#pedido').val() !== ''){
					$.ajax({
				        url     : '/pedido/verificar',
				        method  : 'POST',
				        dataType: 'json',
				        data: {
				            'id' : $('#pedido').val()
				        },
				        success: function(res) {
				        	$('#nome').val('');
			                $('#email').val('')
				            if(typeof(res.success)!=='undefined'){
				                dadosPedido = res.success[0];
				                $('#nome').val(dadosPedido.nome);
				                $('#email').val(dadosPedido.email);
				            } else if(typeof(res.error)!=='undefined') {
				                showMessage('Atenção',res.error,'danger');
				                $('#pedido').focus();
				                
				            } 
				        },
				        error: function(err) {
				            if (err.status === 422) {
				                jQuery.each(err.responseJSON.errors, function(index, value){
				                    showMessage('Atenção',value,'danger');
				                });
				            } else if (err.status === 403) {
				                showMessage('Atenção','Acesso negado','danger');
				            } else {
				                showMessage('Atenção','A requisição falhou: '+err.status+' - '+err.statusText,'warning');
				            }
				        }
				    });
				} else {
					dadosPedido = '';
					$('#nome').val('');
	                $('#email').val('');
				}
			});

			$("#btnCad").click(function(e){
				e.preventDefault();
				if ((formValidator("formChamado")) === 0){
					if(dadosPedido.email !== $('#email').val()){
						$.ajax({
					        url     : '/cliente/atualizar',
					        method  : 'PUT',
					        dataType: 'json',
					        data: {
					            'id'    : dadosPedido.id,
					            'email' : $('#email').val()
					        },
					        success: function(res) {
					            showMessage('Sucesso',res.success,'success'); 
					        },
					        error: function(err) {
					            if (err.status === 422) {
					                jQuery.each(err.responseJSON.errors, function(index, value){
					                    showMessage('Atenção',value,'danger');
					                });
					            } else if (err.status === 403) {
					                showMessage('Atenção','Acesso negado','danger');
					            } else {
					                showMessage('Atenção','A requisição falhou: '+err.status+' - '+err.statusText,'warning');
					            }
					        }
				    	});
					}

					$.ajax({
				        url     : '/chamado/cadastrar',
				        method  : 'POST',
				        dataType: 'json',
				        data: {
				            'pedido_id'   : dadosPedido.id,
				            'titulo'      : $('#titulo').val(),
				            'observacoes' : $('#observacoes').val()
				        },
				        success: function(res) {
				        	if(typeof(res.success)!=='undefined'){
				        		$('.form').validator('destroy');
				        		$('#formChamado').trigger('reset');
				        		$('#pedido').focus();
								showMessage('Sucesso',res.success,'success');
							} else if(typeof(res.error)!=='undefined') {
				        		showMessage('Erro',res.error,'danger');
				        	} 
				        },
				        error: function(err) {
				        	if (err.status === 422) {
								jQuery.each(err.responseJSON.errors, function(index, value){
									showMessage('Atenção',value,'danger');
								});
				        	} else if (err.status === 403) {
				        		showMessage('Atenção','Acesso negado','danger');
				        	} else {
				        		showMessage('Atenção','A requisição falhou: '+err.status+' - '+err.statusText,'warning');
				        	}
				        }
				    });
				} else {
	            	$("html, body").animate({scrollTop: 0}, 700);
	            	showMessage('Atenção','Corrija os erros para continuar','danger');
	            }
    		});
		});
	</script>
@stop