@if (
	(isset($admin) == false && admin()->can('add_admins')) ||
	(isset($admin) && $admin->id != admin()->id && admin()->can('edit_admins'))
)
	<div class="form-group">
		{{ Form::label('roles', 'Roles', ['class' => 'control-label']) }}

		<div class="permissions-checkbox">
			@foreach ($roles as $role)

				@php
					$adminHasRole = false;

					if (isset($admin)) {
						$assignedRoles = $admin->roles->pluck('id')->toArray();
						$adminHasRole = in_array($role->id, $assignedRoles);
					}
				@endphp

				<div class="custom-control custom-checkbox mb-3">
					{{ form()->checkbox('role[]', $role->id, $adminHasRole ?? false(), ['class' => 'custom-control-input', 'id' => "role-{$role->id}"]) }}
					<label class="custom-control-label m-0" for="role-{{ $role->id }}">
						{{ $role->name }}
					</label>
				</div>
			@endforeach
		</div>
	</div>
@endif
