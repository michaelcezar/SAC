@extends('layout')

@section('pageTitle') Listar Chamados @stop

@section('extraCSS') 
	<link href="/js/datatables/dataTables.bootstrap4.min.css"  rel="stylesheet">
@stop

@section('pageContent')
	<div class="row">
		<div class="col-sm-12">
			<div class="card fat">
				<div class="card-header">
				    Listar Chamados
				</div>
				<div class="card-body">
					<div class="table-responsive">
	  					<table class="table table-hover table-overflow" id="tableListarChamado" width="100%">
							<thead>
							    <tr>
							    	<th>Cliente</th>
								    <th>E-Mail</th>
								    <th>Pedido</th>
								    <th>Item</th>
								    <th>Título</th>
								    <th>Observação</th>
								    <th>Realizado Em</th>
							    </tr>
					  		</thead>
					  		<tbody>
						  	</tbody>
	  					</table>
	  				</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('extraJavaScript')
	<script src="/js/datatables/jquery.dataTables.min.js"         type="text/javascript"></script>
	<script src="/js/datatables/dataTables.bootstrap4.min.js"     type="text/javascript"></script>
	<script src="/js/datatables/dataTablesUtilities.js"           type="text/javascript"></script>
	<script src="/js/moment-with-locales.js"                      type="text/javascript"></script>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			$("#chamados").addClass("active");

			tabListaChamado = $('#tableListarChamado').DataTable({
		        'language'   : dataTablesLanguage('pt-br'),
		        'aLengthMenu': dataTablesLengthSelect('asc'),
		        'ajax': {
		            'url'    : '/chamado/listar',
		            'type'   : 'POST',
		            'dataSrc': '',
		        },
		        'aoColumns': [
		        	{ "mData": "nome"},
		        	{ "mData": "email"},
		        	{ "mData": "numPedido", "type": "num", "className": " alncenter"},
                	{ "mData": "item"},
                	{ "mData": "titulo"},
                	{ "mData": "observacoes"},
                	{ "mData": "created_at", "className": " alncenter",
		                'render':{ 
		                    _:function ( data, type, full, meta ) {
		                        if (data == null) {
		                            data = '';
		                            return data;
		                        }
		                        else{
		                            var yyy = moment(data,'YYYY-MM-DD HH:mm:ss');
		                            return yyy.format("DD/MM/YYYY");
		                        }
		                    },
		                    sort:function(data){
		                        return data;
		                    }
		                }
            		}
                ]
			})
		});
	</script>
@stop