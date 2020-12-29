<div class="card">
    <div class="card-header">
        <h4 class="card-header-title">
            <i class="bx bx-info-circle text-primary mr-2"></i>
            Información Adicional
        </h4>
    </div>

    <div class="card-body">

        @modelProperty(['title' => 'Creado el'])
            {{ $model->created_at->formatLocalized('%d de %B de %Y, %H:%M:%S') }}
        @endmodelProperty

        @modelProperty(['title' => 'Última Modificación'])
            {{ $model->updated_at->formatLocalized('%d de %B de %Y, %H:%M:%S') }}
        @endmodelProperty

        @if (method_exists($model, 'trashed'))
            @modelProperty(['title' => 'Estado'])
                @include('nexus::misc/models/status-badge')
            @endmodelProperty
        @endif

        {{ $slot ?? '' }}

    </div>
</div>
