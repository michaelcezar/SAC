@extends('layout')

@section('pageTitle') Listar Pedidos @stop

@section('extraCSS') 
	<link href="/js/datatables/dataTables.bootstrap4.min.css"  rel="stylesheet">
@stop

@section('pageContent')
	<div class="row">
		<div class="col-sm-12">
			<div class="card fat">
				<div class="card-header">
				    Listar Pedidos
				</div>
				<div class="card-body">
					<div class="table-responsive">
	  					<table class="table table-hover table-overflow" id="tableListarPedido" width="100%">
							<thead>
							    <tr>
							    	<th>Pedido</th>
								    <th>Cliente</th>
								    <th>Item</th>
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
			$("#pedidos").addClass("active");

			tabListaPedido = $('#tableListarPedido').DataTable({
		        'language'   : dataTablesLanguage('pt-br'),
		        'aLengthMenu': dataTablesLengthSelect('asc'),
		        'ajax': {
		            'url'    : '/pedido/listar',
		            'type'   : 'POST',
		            'dataSrc': '',
		        },
		        'aoColumns': [
		        	{ "mData": "id", "type": "num"},
		        	{ "mData": "nome"},
                	{ "mData": "item"},
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