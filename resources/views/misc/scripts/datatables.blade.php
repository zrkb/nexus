@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/datatables.min.js" type="text/javascript"></script>

	<script type="text/javascript">
		class Table
		{
			constructor()
			{
				this.tables = $('.datatable');

				this.language = {
					"searchPlaceholder": "Buscar",
					"sSearch":         "",
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando _START_ - _END_ / _TOTAL_ registros",
					"sInfoEmpty":      "",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando ...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					},
					buttons: {
						copyTitle: 'Copiar al Portapapeles',
						copySuccess: {
							_: 'Se copiaron %d registros',
							1: '1 registro copiado'
						}
					}
				};

				this.buttons = [
					{
						extend: 'copy',
						text: 'Copiar',
						footer: true,
					},
					{
						extend: 'excelHtml5',
						text: 'Excel',
						footer: true,
						exportOptions: {
							columns: ':visible',
							format: {
								body: (data, row, column, node) => {
									return this.parseDatacell(data, row, column, node);
								}
							}
						}
					},
					{
						extend: 'csvHtml5',
						text: 'CSV',
						footer: true,
						exportOptions: {
							columns: ':visible',
							format: {
								body: (data, row, column, node) => {
									return this.parseDatacell(data, row, column, node);
								}
							}
						}
					},
					{
						extend: 'pdfHtml5',
						text: 'PDF',
						footer: true,
					},
					{
						extend: 'print',
						text: 'Imprimir',
						footer: true,
					}
				];

				this.options = {
					language: this.language,
					dom: 'Bfrt',
					buttons: this.buttons,
					bPaginate: false
				};

				this.init();
			}

			init()
			{

				$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-sm btn-white px-3';

				var extensions = {
					"sWrapper": "dataTables_wrapper dt-bootstrap4",
					"sFilterInput": "form-control form-control-flush search"
				}

				$.extend($.fn.dataTableExt.oStdClasses, extensions);

				this.tables.each((index, element) => {
					let table = $(element);
					let userDefaults = {};

					if (table.data('column-order')) {
					    let order = table.data('column-order').split(':');
					    if (order.length == 1) order[1] = 'asc';
					    
					    userDefaults = {
					    	order: [ [ order[0], order[1] ] ]
					    }
					}

					let settings = $.extend({}, userDefaults, this.options);

					// Init datatable
					table.DataTable(settings);
				})

				$('.dt-buttons').detach().appendTo('#table-export-buttons');
				$('.dataTables_filter').detach().appendTo('#table-search-filter');
			}

			parseDatacell(data, row, column, node)
			{
				if (! data) return;

				let htmlData = $(data);

				if (htmlData.hasClass('numeric')) {

					data = htmlData.html();

					data = data.replace(/[$.]/g, '');
					data = data.replace(/[$,]/g, '');
					data = data.replace(/[$%]/g, '');
				}

				data = data.replace(/(&nbsp;|<(?:.|\n)*?>)/igm, '');

				data = $.trim(data);

				return data;
			}
		}

		jQuery(document).ready(new Table);
	</script>
@endpush
