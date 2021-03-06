<div class="dropdown">

    <a href="javascript:;" id="crud-actions-{{ $model->getKey() }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="action-item text-body">
            <i class='bx bx-dots-horizontal-rounded'></i>
        </span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="crud-actions-{{ $model->getKey() }}">

        {{ $top ?? null }}

        @isset($top)
            <div class="dropdown-divider"></div>
        @endisset

        <a
            href="{{ resource('show', $routeKey ?? $model->getKey()) }}"
            class="dropdown-item">
            Ver Detalle
        </a>

        <a
            href="{{ resource('edit', $routeKey ?? $model->getKey()) }}"
            class="dropdown-item">
            Editar
        </a>

        <a
            href="{{ resource('destroy', $routeKey ?? $model->getKey()) }}"
            class="dropdown-item text-danger delete-record"
            data-form="#delete-form-{{ $model->getKey() }}"
            data-record="{{ $model->getKey() }}"
            @if ($model->willForceDelete())
                data-delete="hard"
            @endif>
            @if ($model->willForceDelete())
                Forzar Eliminar
            @else
                Eliminar
            @endif
        </a>

        <form
            id="delete-form-{{ $model->getKey() }}"
            action="{{ resource('destroy', $routeKey ?? $model->getKey()) }}"
            method="POST"
            class="d-none">
            @csrf
            @method('DELETE')
        </form>

        @isset($bottom)
            <div class="dropdown-divider"></div>
        @endisset

        {{ $bottom ?? null }}
    </div>
</div>
