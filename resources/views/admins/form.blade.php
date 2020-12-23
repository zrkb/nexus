<div class="card card-body">

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                {{ form()->label('firstname', 'Nombre', ['class' => 'control-label']) }}
                {{ form()->text('firstname', null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                {{ form()->label('lastname', 'Apellido', ['class' => 'control-label']) }}
                {{ form()->text('lastname', null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="form-group">
        {{ form()->label('email', 'Email', ['class' => 'control-label']) }}
        {{ form()->email('email', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ form()->label('password', 'Password', ['class' => 'control-label']) }}

        <div class="input-group input-group-merge input-group-password">
            {{ form()->password('password', ['class' => 'form-control form-control-appended', 'placeholder' => (isset($admin) ? 'Dejar en blanco si no desea cambiarlo.' : null), (isset($admin) ? null : 'required'), 'data-toggle' => 'password']) }}
            <div class="input-group-append">
                <div class="input-group-text bg-transparent">
                    <a href="javascript:;" tabindex="-1">
                        <i class='bx bxs-hide text-muted'></i>
                    </a>
                </div>
            </div>
        </div>

        <small class="form-text text-muted mt-3">
            El password debe constar de por lo menos 6 caracteres.
        </small>
    </div>

    @include('nexus::admins/permissions')

</div>
