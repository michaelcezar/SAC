@extends('layout')

@section('pageTitle') Relatório de Chamados @stop

@section('extraCSS') 
	<link href="/js/datatables/dataTables.bootstrap4.min.css"            rel="stylesheet" type='text/css'/>
	<link href='/js/datatables/Buttons/css/buttons.bootstrap4.min.css'   rel='stylesheet' type='text/css'/>
@stop

@section('pageContent')
	<div class="row">
		<div class="col-sm-12">
			<div class="card fat">
				<div class="card-header">
				    Relatório de Chamados
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive" style="display:none">
			  					<table class="table table-hover table-overflow" id="tableRelatorio" width="100%">
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
		</div>
	</div>
@stop

@section('extraJavaScript')
	<script src="/js/datatables/jquery.dataTables.min.js"         type="text/javascript"></script>
	<script src="/js/datatables/dataTables.bootstrap4.min.js"     type="text/javascript"></script>
	<script src='/js/datatables/Buttons/js/dataTables.buttons.js' type='text/javascript'></script>
    <script src='/js/datatables/Buttons/js/buttons.bootstrap4.js' type='text/javascript'></script>
    <script src='/js/datatables/JSZip/jszip.min.js'               type='text/javascript'></script>
    <script src='/js/datatables/pdfmake/pdfmake.min.js'           type='text/javascript'></script>
    <script src='/js/datatables/pdfmake/vfs_fonts.js'             type='text/javascript'></script>
    <script src='/js/datatables/Buttons/js/buttons.html5.js'      type='text/javascript'></script>
    <script src='/js/datatables/Buttons/js/buttons.print.js'      type='text/javascript'></script>
	<script src="/js/datatables/dataTablesUtilities.js"           type="text/javascript"></script>
	<script src="/js/moment-with-locales.js"                      type="text/javascript"></script>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			$("#chamados").addClass("active");
			modalPesquisa();
		});

		function modalPesquisa(){
			$("#areaModal").html("");
     		$("#areaModal").html("\n\
     			 <div class='modal fade ' tabindex='-1' role='dialog' aria-labelledby='searchModal' aria-hidden='true' data-backdrop='static' id='searchModal'>\n\
		            <div class='modal-dialog mw-100 w-75'>\n\
		                <div class='modal-content'>\n\
		                    <div class='modal-header'>\n\
		                        <h5 class='modal-title'>Pesquisar Chamados</h5>\n\
		                    </div>\n\
		                    <div class='modal-body'>\n\
		                        <form id='formSearch'>\n\
		                            <div class='form-row'>\n\
									    <div class='form-group col-md-6'>\n\
									      <label for='email'>E-Mail do Cliente</label>\n\
									      <input type='email' class='form-control' id='email' placeholder='Todos' autocomplete='off' autofocus data-error='Digite o e-mail do cliente.' >\n\
									      <div class='help-block with-errors'></div>\n\
									    </div>\n\
									     <div class='form-group col-md-6'>\n\
									      <label for='pedidos'>Número do Pedido</label>\n\
									      <input type='text' class='form-control' id='pedido' placeholder='Todos' autocomplete='off' data-error='Digite um e-mail correto.'>\n\
									      <div class='help-block with-errors'></div>\n\
									    </div>\n\
									</div>\n\
		                        </form>\n\
		                    </div>\n\
		                    <div class='modal-footer'>\n\
		                        <button type='button' class='btn btn-success' id='btnmodalOk'>Pesquisar</button>\n\
		                        <button type='button' class='btn btn-secondary' id='btnModalClose' data-dismiss='modal' >Cancelar</button>\n\
		                    </div>\n\
		                </div>\n\
		            </div>\n\
		        </div>\n\
     		");

			$('#searchModal').modal();
			
			$('#email').focus();
			$("#btnmodalOk").click(function(e){
            	e.preventDefault();

            	searchParams = {
				    'email'    :  $('#email').val(),
				    'id_pedido':  $('#pedido').val()
			    };

            	if (typeof(tabRelatorio) !=='undefined'){
            		tabRelatorio.ajax.reload();
            	} else {
            		geraTabela();
            	}
            	$("#btnModalClose").click();
            });
		}

		function geraTabela(){
			$('.table-responsive').css('display','block');
			tabRelatorio = $('#tableRelatorio').DataTable({
		        'language'   : dataTablesLanguage('pt-br'),
		        'aLengthMenu': dataTablesLengthSelect('asc'),
		        
		        'ajax': {
		            'url'    : '/chamado/listar',
		            'type'   : 'POST',
		            'data'   : function(){ return searchParams},
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
                ],
                'drawCallback': function() {
                	 $('#tableRelatorio_filter').html('');
                	 var buttons = new $.fn.dataTable.Buttons($('#tableRelatorio'), {
						buttons: [
							{
								text: 'Pesquisar',
                            	attr:  {'onClick': 'modalPesquisa();'}
                           	},
							{
								extend:    'excelHtml5',
                            	text:      'Excel',
                            },
                            {
								extend:    'pdfHtml5',
                            	text:      'PDF',
                            },
                            {
								extend:    'print',
                            	text:      'Imprimir',
                            }   
					    ]
                	 }).container().appendTo($('#tableRelatorio_filter'));
               	}
			});
		}
	</script>
@stop