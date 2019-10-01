<div class="dropdown">
	<a href="javascript:;" id="crud-actions-{{ $model->getKey() }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="action-item">
			<i class='bx bx-dots-horizontal-rounded'></i>
		</span>
	</a>

	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="crud-actions-{{ $model->getKey() }}">
		<a
			href="{{ resource('show', ['id' => $model->getKey()]) }}"
			class="dropdown-item">
			Ver Detalle
		</a>

		<a
			href="{{ resource('edit', ['id' => $model->getKey()]) }}"
			class="dropdown-item">
			Editar
		</a>

		<a
			href="{{ resource('destroy', ['id' => $model->getKey()]) }}"
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
			action="{{ resource('destroy', ['id' => $model->getKey()]) }}"
			method="POST"
			class="d-none">
			@csrf
			@method('DELETE')
		</form>
	</div>
</div>
