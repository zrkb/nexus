@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[data-toggle="daterangepicker"]').daterangepicker({
                timePicker: {{ isset($timePicker) && $timePicker === true ? 'true' : 'false' }},
                timePickerIncrement: {{ $timePickerIncrement ?? 1 }},
                timePicker24Hour: {{ isset($timePicker24Hour) && $timePicker24Hour === false ? 'false' : 'true' }},
                autoApply: {{ isset($autoApply) && $autoApply === false ? 'false' : 'true' }},
                opens: '{{ $opens ?? 'center'}}',
                ranges: {
                    'Hoy': [moment().startOf('day'), moment().endOf('day')],
                    'Ayer': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days').endOf('day')],
                    'Últimos 7 Días': [moment().subtract(6, 'days').startOf('day'), moment().endOf('day')],
                    'Últimos 30 Días': [moment().subtract(29, 'days').startOf('day'), moment().endOf('day')],
                    'Este mes': [moment().startOf('month'), moment().endOf('month')],
                    'Mes Anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Este Año': [moment().startOf('year'), moment().endOf('year')],
                },
                cancelClass: 'btn-sm btn-white font-weight-normal',
                locale: {
                    format: '{{ $format ?? "YYYY-MM-DD" }}',
                    customRangeLabel: 'Personalizado',
                    applyLabel: 'Aplicar',
                    cancelLabel: 'Cancelar',
                    fromLabel: 'Desde',
                    toLabel: 'Hasta',
                    weekLabel: 'S',
                    daysOfWeek: ['Do','Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    monthNames: [
                        'Enero', 'Febrero', 'Marzo', 'Abril',
                        'Mayo', 'Junio', 'Julio', 'Agosto',
                        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ],
                    firstDay: 0
                }
            }).on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('{{ $format ?? "YYYY-MM-DD" }}') + ' - ' + picker.endDate.format('{{ $format ?? "YYYY-MM-DD" }}'));
            });
        });
    </script>
@endpush
