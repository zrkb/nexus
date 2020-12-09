@extends('nexus::auth/container')

@section('auth')

    <div class="card card-body">
        <!-- Heading -->
        <h1 class="display-5 text-center mb-3">
            @lang('nexus::register.welcome-title')
        </h1>

        <!-- Subheading -->
        <p class="text-muted text-center mb-5">
            @lang('nexus::register.welcome-slogan')
        </p>

        <!-- Form -->
        {{ form()->open(['url' => admin_base_path('register'), 'method' => 'POST']) }}

            <!-- Firstname -->
            <div class="form-group">
                {{ form()->label('firstname', trans('nexus::register.firstname-label')) }}
                {{ form()->text('firstname', null, ['class' => 'form-control', 'placeholder' => trans('nexus::register.firstname-placeholder')]) }}
            </div>
            <!-- End Firstname -->

            <!-- Lastnmame -->
            <div class="form-group">
                {{ form()->label('lastname', trans('nexus::register.lastname-label')) }}
                {{ form()->text('lastname', null, ['class' => 'form-control', 'placeholder' => trans('nexus::register.lastname-placeholder')]) }}
            </div>
            <!-- End Lastnmame -->

            <!-- Email address -->
            <div class="form-group">
                {{ form()->label('email', trans('nexus::register.user-label')) }}
                {{ form()->text('email', null, ['class' => 'form-control', 'placeholder' => trans(('nexus::register.user-placeholder'))]) }}
            </div>
            <!-- End Email address -->

            <!-- Password -->
            <div class="form-group">
                {{ form()->label('password', trans('nexus::register.password-label')) }}
                {{ form()->password('password', null, ['class' => 'form-control', 'placeholder' => trans('nexus::register.password-placeholder')]) }}
            </div>
            <!-- End Password -->

            <!-- Password confirmation -->
            <div class="form-group">
                {{ form()->label('password_confirmation', trans('nexus::register.password-confirmation-label')) }}
                {{ form()->password('password_confirmation', null, ['class' => 'form-control', 'placeholder' => trans('nexus::register.password-confirmation-placeholder')]) }}
            </div>
            <!-- End Password confirmation -->

            <!-- Submit -->
            <button class="btn btn-block btn-primary mb-3">
                @lang('nexus::register.submit-label')
            </button>
            <!-- End Submit -->

        {{ form()->close() }}
    </div>

    <!-- Link -->
    <div class="text-center mt-4">
        <span class="text-muted text-center">
            @lang('nexus::register.footer')
        </span>
    </div>

@endsection
