@extends('layout')

@section('pageTitle') Novo Pedido @stop

@section('extraCSS')
<link href="/css/bootstrap-select.css"  rel="stylesheet">

@stop

@section('pageContent')
	<div class="row">
		<div class="col-sm-12">
			<div class="card fat">
				<div class="card-header">
				    Novo Pedido
				</div>
				<div class="card-body">
					<form id='formPedido' class='form'>
						<div class="form-row">
							<div class="form-group col-md-6">
						      <label for="nome">Cliente</label>
						      <select class='form-control' id='sel-cliente' required data-error="Selecione o cliente" data-live-search="true">
                              </select>
						      <div class="help-block with-errors"></div>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="item">Item</label>
						      <input type="text" class="form-control" id="item" placeholder="Item" autocomplete="off" required data-error="Digite o item">
						      <div class="help-block with-errors"></div>
						    </div>
						</div>
						<hr>
						<div class="form-row">
							<div class="form-group col-md-2">
								<button type="button" class="btn btn-outline-success col-md-12" id="btnCad">Cadastrar Pedido</button>
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
	
	<script src="/js/bootstrap-select.js"  type="text/javascript"></script>
	<script src="/js/bootstrap-select-pt_BR.js"  type="text/javascript"></script>
	
	<script type="text/javascript">
		jQuery(document).ready(function(){
			$("#pedidos").addClass("active");

			$("#btnFormCancel").click(function(e){
				$(location).attr('href', '../../');
    		});

			$.ajax({
		        url:      '/cliente/listar',
		        method:   'POST',
		        dataType: 'json',
		        success: function(data){
		            var option = '';
		            $.each(data, function(i, types) {
		                option += '<option value="'+types.id+'">'+types.nome+'</option>';
		            });
		            $('#sel-cliente').append(option).show();
            		$('#sel-cliente').selectpicker();
            		$('#sel-cliente').selectpicker('val', '');
		        }
		    }); 

    		$("#btnCad").click(function(e){
				e.preventDefault();
				if ((formValidator("formPedido")) === 0){
					$.ajax({
				        url     : '/pedido/cadastrar',
				        method  : 'POST',
				        dataType: 'json',
				        data: {
				            'cliente_id'  : $('#sel-cliente').val(),
				            'item'        : $('#item').val()     
				        },
				        success: function(res) {
				        	if(typeof(res.success)!=='undefined'){
				        		$('.form').validator('destroy');
				        		$('#formPedido').trigger('reset');
				        		$('#sel-cliente').selectpicker('val', '');
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