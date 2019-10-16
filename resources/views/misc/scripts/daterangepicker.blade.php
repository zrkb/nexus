@push('scripts')
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script>
		$(function() {
			$('input[data-toggle="daterangepicker"]').daterangepicker({
				opens: 'center',
				ranges: {
		           'Hoy': [moment(), moment()],
		           'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		           'Últimos 7 Días': [moment().subtract(6, 'days'), moment()],
		           'Últimos 30 Días': [moment().subtract(29, 'days'), moment()],
		           'Este mes': [moment().startOf('month'), moment().endOf('month')],
		           'Mes Anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
		           'Este Año': [moment().startOf('year'), moment().endOf('year')],
		        },
				locale: {
					format: 'YYYY-MM-DD'
				}
			});
		});
	</script>
@endpush
