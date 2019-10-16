@if (method_exists($model, 'trashed') && $model->trashed())
	<div class="card border border-warning my-4">
		<div class="card-body d-flex justify-content-between">
			<div class="bx-wrapper">
				<i class="bx bx-info-circle text-warning mr-2"></i>
				Este registro se encuentra <strong>Inactivo</strong>. Para recuperarlo por favor presione el botón Restaurar.
			</div>

			<form
				action="{{ resource('restore', $model->getKey()) }}"
				method="POST">
				@csrf
				<button
					type="submit"
					class="btn btn-sm btn-warning">
					Restaurar
				</button>
			</form>
		</div>
	</div>
@endif
