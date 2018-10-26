@extends('layout')

@section('pageTitle') Início @stop

@section('pageContent')

	<div class="row">
		<div class="col-md-12">
			<div class="card fat">
				<div class="card-header">
				    Início
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-4">
							<div class="card fat">
								<div class="card-header text-white bg-info text-center">
								    Clientes Cadastrados
								</div>
								<div class="card-body text-center"> 
									<span id="totalCliente" class="counter">0</span>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card fat">
								<div class="card-header text-white bg-info text-center">
								    Pedidos Realizados
								</div>
								<div class="card-body text-center">
									<span id="totalPedido" class="counter">0</span>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card ">
								<div class="card-header fat text-white bg-info text-center">
								    Chamados Realizados
								</div>
								<div class="card-body text-center">
									<span id="totalChamado" class="counter">0</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('extraJavaScript')
	<script type="text/javascript">
		jQuery(document).ready(function(){
			$("#inicio").addClass("active");

			$.ajax({
		        url     : '/cliente/count',
		        method  : 'GET',
		        dataType: 'json',
		        success: function(res) {
		        	$('#totalCliente').html(res);
		        	$('#totalCliente').each(function () {
				        $(this).prop('Counter',0).animate({
				            Counter: $(this).text()
				        }, {
				            duration: 1000,
				            easing: 'swing',
				            step: function (now) {
				                $(this).text(Math.ceil(now));
				            }
				        });
				    });
		        }
		    });

			$.ajax({
		        url     : '/pedido/count',
		        method  : 'GET',
		        dataType: 'json',
		        success: function(res) {
		        	$('#totalPedido').html(res);
		        	$('#totalPedido').each(function () {
				        $(this).prop('Counter',0).animate({
				            Counter: $(this).text()
				        }, {
				            duration: 1000,
				            easing: 'swing',
				            step: function (now) {
				                $(this).text(Math.ceil(now));
				            }
				        });
				    });
		        }
		    });

		    $.ajax({
		        url     : '/chamado/count',
		        method  : 'GET',
		        dataType: 'json',
		        success: function(res) {
		        	$('#totalChamado').html(res);
		        	$('#totalChamado').each(function () {
				        $(this).prop('Counter',0).animate({
				            Counter: $(this).text()
				        }, {
				            duration: 1000,
				            easing: 'swing',
				            step: function (now) {
				                $(this).text(Math.ceil(now));
				            }
				        });
				    });
		        }
		    });
        	


		});
	</script>
@stop