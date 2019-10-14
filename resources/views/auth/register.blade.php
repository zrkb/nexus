@extends('nexus::layouts/master')

@section('app')

<div class="d-flex align-items-center bg-auth border-top border-top-2 border-primary min-vh-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-10 col-md-5 col-lg-4 my-5 mx-auto" style="max-width: 320px;">

                <div class="row">
                    <div class="col-12">
                        <div class="card-wrapper">
                            @include('nexus::layouts/errors')
                        </div>
                    </div>
                </div>
                
                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    @lang('nexus::register.welcome-title')
                </h1>
                
                <!-- Subheading -->
                <p class="text-muted text-center mb-5">
                    @lang('nexus::register.welcome-slogan')
                </p>
                <!-- Form -->
                <form action="{{ admin_base_path('register') }}" method="POST">
                    @csrf
                    <!-- Name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('nexus::register.name-label')
                        </label>
                        <!-- Input -->
                        {{ form()->text('firstname', null, ['class' => 'form-control', 'placeholder' => trans('nexus::register.name-placeholder') ]) }}
                    </div>
                    <!-- Email address -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('nexus::register.user-label')
                        </label>
                        <!-- Input -->
                        {{ form()->email('email', null, ['class' => 'form-control', 'placeholder' => trans('nexus::register.user-placeholder') ]) }}
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('nexus::register.password-label')
                        </label>
                        <!-- Input -->
                        {{ form()->password('password', ['class' => 'form-control', 'placeholder' => trans('nexus::register.password-placeholder') ]) }}
                    </div>
                    <!-- Password Confirmation -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('nexus::register.password-confirmation-label')
                        </label>
                        <!-- Input -->
                        {{ form()->password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('nexus::register.password-confirmation-placeholder') ]) }}
                    </div>
                    <!-- Submit -->
                    <button class="btn btn-lg btn-block btn-primary mb-3">
                        @lang('nexus::register.submit-label')
                    </button>
                    <!-- Link -->
                    <div class="text-center">
                        <span class="text-muted text-center">
                            @lang('nexus::register.footer')
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <!-- / .row -->
    </div>
    <!-- / .container -->
</div>

@endsection
