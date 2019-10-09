@if (method_exists($model, 'trashed') && $model->trashed())
	<div class="card border-custom mt-4 mb-4">
		<div class="card-body">
			<span class="float-left mt-1">
				<i data-feather="alert-circle" class="text-custom mr-2"></i>
				Este registro se encuentra <strong>Inactivo</strong>. Para recuperarlo por favor presione el botón Restaurar.
			</span>

			<form
				action="{{ resource('restore', $model->getKey()) }}"
				method="POST">
				@csrf
				<button
					type="submit"
					class="btn btn-sm btn-custom float-right">
					Restaurar
				</button>
			</form>
		</div>
	</div>
@endif
