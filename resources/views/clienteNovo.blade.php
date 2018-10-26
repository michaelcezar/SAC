@extends('layout')

@section('pageTitle') Novo Cliente @stop

@section('pageContent')
	<div class="row">
		<div class="col-sm-12">
			<div class="card fat">
				<div class="card-header">
				    Novo Cliente
				</div>
				<div class="card-body">
					<form id='formCliente' class='form'>
						<div class="form-row">
							<div class="form-group col-md-6">
						      <label for="nome">Nome</label>
						      <input type="text" class="form-control" id="nome" autofocus placeholder="Nome" autocomplete="off" required data-error="Digite o nome do cliente">
						      <div class="help-block with-errors"></div>
						    </div>
							<div class="form-group col-md-6">
						      <label for="e-mail">E-Mail</label>
						      <input type="email" class="form-control" id="email" placeholder="E-Mail" autocomplete="off" data-error="Digite um e-mail válido">
						      <div class="help-block with-errors"></div>
						    </div>
						</div>
						<hr>
						<div class="form-row">
							<div class="form-group col-md-2">
								<button type="button" class="btn btn-outline-success col-md-12" id="btnCad">Cadastrar Cliente</button>
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
			$("#clientes").addClass("active");

			$("#btnFormCancel").click(function(e){
				$(location).attr('href', '../../');
    		});

    		$("#btnCad").click(function(e){
				e.preventDefault();
				if ((formValidator("formCliente")) === 0){
					$.ajax({
				        url     : '/cliente/cadastrar',
				        method  : 'POST',
				        dataType: 'json',
				        data: {
				            'email' : $('#email').val(),
				            'nome'   : $('#nome').val()
				        },
				        success: function(res) {
				        	if(typeof(res.success)!=='undefined'){
				        		$('.form').validator('destroy');
				        		$('#formCliente').trigger('reset');
				        		$('#nome').focus();
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