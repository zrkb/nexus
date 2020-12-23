@extends('nexus::auth/container')

@section('auth')

    <div class="card card-body">
        <!-- Heading -->
        <h1 class="display-5 text-center mb-3">
            @lang('nexus::login.welcome-title')
        </h1>

        <!-- Subheading -->
        <p class="text-muted text-center mb-5">
            @lang('nexus::login.welcome-slogan')
        </p>
        <!-- Form -->
        {{ form()->open(['url' => admin_base_path('login'), 'method' => 'POST']) }}

            <!-- Email address -->
            <div class="form-group">
                {{ form()->label('email', trans('nexus::register.user-label')) }}
                {{ form()->text('email', null, ['class' => 'form-control', 'placeholder' => __('nexus::register.user-placeholder')]) }}
            </div>
            <!-- End Email address -->

            <!-- Password -->
            <div class="form-group">
                {{ form()->label('password', trans('nexus::login.password-label')) }}
                <div class="input-group input-group-merge input-group-password">
                    {{ form()->password('password', ['class' => 'form-control form-control-appended', 'placeholder' => trans('nexus::login.password-placeholder')]) }}
                    <div class="input-group-append">
                        <div class="input-group-text bg-transparent">
                            <a href="javascript:;" tabindex="-1">
                                <i class='bx bxs-hide text-muted'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Password -->

            <!-- Submit -->
            <button class="btn btn-block btn-primary mb-3">
                @lang('nexus::login.submit-label')
            </button>
            <!-- End Submit -->

        {{ form()->close() }}
    </div>

    @if (config('nexus.registration_enabled'))
        <!-- Link -->
        <div class="text-center mt-4">
            <span class="text-muted text-center">
                @lang('nexus::login.footer')
            </span>
        </div>
    @endif

@endsection
