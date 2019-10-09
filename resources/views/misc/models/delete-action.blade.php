<div class="card border-danger">
	<div class="card-body">
		<h3 class="card-title mb-4 pb-4 border-bottom text-danger font-weight-normal">
			<i class='bx bx-trash-alt mr-2'></i>
			Eliminar Registro
		</h3>

		@if (
			method_exists($model, 'trashed') == false ||
			(method_exists($model, 'trashed') && $model->trashed())
		)
			<p>Una vez que se realice esta acción, ya no podrá deshacer la misma.</p>
		@else
			<p>Al presionar este botón, usted estará marcando el registro como <span class="text-danger">Inactivo</span></p>
		@endif
		
		<button
			class="btn btn-danger delete-record"
			@if ($model->willForceDelete())
				data-delete="hard"
			@endif
			data-form="#delete-form-{{ $model->getKey() }}">Eliminar</button>

		<form
			id="delete-form-{{ $model->getKey() }}"
			action="{{ resource('destroy', $model->getKey()) }}"
			method="POST"
			class="d-none">
			@csrf
			@method('DELETE')
		</form>
		
	</div>
	{{-- END card-body --}}
</div>
{{-- END card --}}
