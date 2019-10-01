@extends('laramie::layouts/master')

@section('app')

<div class="d-flex align-items-center bg-auth border-top border-top-2 border-primary min-vh-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
                <!-- Image -->
                <div class="text-center">
                    <img src="{{ asset('vendor/laramie/assets/img/illustrations/happiness.svg') }}" alt="..." class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

                <div class="row">
                    <div class="col-12">
                        <div class="card-wrapper">
                            @include('laramie::layouts/errors')
                        </div>
                    </div>
                </div>
                
                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    @lang('laramie::register.welcome-title')
                </h1>
                
                <!-- Subheading -->
                <p class="text-muted text-center mb-5">
                    @lang('laramie::register.welcome-slogan')
                </p>
                <!-- Form -->
                <form action="{{ admin_base_path('register') }}" method="POST">
                    @csrf
                    <!-- Name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('laramie::register.name-label')
                        </label>
                        <!-- Input -->
                        {{ form()->text('firstname', null, ['class' => 'form-control', 'placeholder' => trans('laramie::register.name-placeholder') ]) }}
                    </div>
                    <!-- Email address -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('laramie::register.user-label')
                        </label>
                        <!-- Input -->
                        {{ form()->email('email', null, ['class' => 'form-control', 'placeholder' => trans('laramie::register.user-placeholder') ]) }}
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('laramie::register.password-label')
                        </label>
                        <!-- Input -->
                        {{ form()->password('password', ['class' => 'form-control', 'placeholder' => trans('laramie::register.password-placeholder') ]) }}
                    </div>
                    <!-- Password Confirmation -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('laramie::register.password-confirmation-label')
                        </label>
                        <!-- Input -->
                        {{ form()->password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('laramie::register.password-confirmation-placeholder') ]) }}
                    </div>
                    <!-- Submit -->
                    <button class="btn btn-lg btn-block btn-primary mb-3">
                        @lang('laramie::register.submit-label')
                    </button>
                    <!-- Link -->
                    <div class="text-center">
                        <span class="text-muted text-center">
                            @lang('laramie::register.footer')
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
