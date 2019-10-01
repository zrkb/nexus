<div class="form-group">
	{{ form()->label('name', 'Nombre', ['class' => 'control-label']) }}
	{{ form()->text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form()->label('name', 'Guard', ['class' => 'control-label']) }}
	{{ form()->text('guard_name', 'admin', ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<table class="table">
		<thead>
			<tr>
				<th class="w-50">Permisos</th>
				<th class="text-center" style="width: 12.5%">Ver</th>
				<th class="text-center" style="width: 12.5%">Agregar</th>
				<th class="text-center" style="width: 12.5%">Modificar</th>
				<th class="text-center" style="width: 12.5%">Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($permissions as $name => $actions)
				<tr>
					<td>
						<strong>{{ str_slug($name) }}</strong>
					</td>
					@foreach($actions as $action)

						@php
							$roleHasPermission = isset($role) ? $role->hasPermissionTo($action->name) : false;
						@endphp

						<td class="text-center">
							<div class="custom-control custom-checkbox">
								{{ form()->checkbox('permissions[]', $action->name, $roleHasPermission, ['class' => 'custom-control-input', 'id' => "permission-{$action->id}-checkbox"]) }}
								<label class="custom-control-label m-0" for="permission-{{ $action->id }}-checkbox">
									&nbsp;
								</label>
							</div>
						</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
