<div class="form-group">
	{{ form()->label('firstname', 'Nombre', ['class' => 'control-label']) }}
	{{ form()->text('firstname', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form()->label('lastname', 'Apellido', ['class' => 'control-label']) }}
	{{ form()->text('lastname', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form()->label('email', 'Email', ['class' => 'control-label']) }}
	{{ form()->email('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ form()->label('password', 'Contraseña', ['class' => 'control-label']) }}
	{{ form()->password('password', ['class' => 'form-control']) }}
</div>

@include('nexus::admins/permissions')
