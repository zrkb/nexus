@extends('nexus::layouts/master')

@section('app')

<div class="d-flex align-items-center bg-auth border-top border-top-2 border-primary min-vh-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
                <!-- Image -->
                <div class="text-center">
                    <img src="{{ asset('vendor/nexus/assets/img/illustrations/happiness.svg') }}" alt="..." class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

                <div class="row">
                    <div class="col-12">
                        <div class="card-wrapper">
                            @include('nexus::layouts/errors')
                        </div>
                    </div>
                </div>
                
                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    @lang('nexus::login.welcome-title')
                </h1>
                
                <!-- Subheading -->
                <p class="text-muted text-center mb-5">
                    @lang('nexus::login.welcome-slogan')
                </p>
                <!-- Form -->
                <form action="{{ admin_base_path('login') }}" method="POST">
                    @csrf
                    <!-- Email address -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('nexus::login.user-label')
                        </label>
                        <!-- Input -->
                        <input
                            name="email"
                            type="email"
                            class="form-control"
                            placeholder="@lang('nexus::login.user-placeholder')">
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            @lang('nexus::login.password-label')
                        </label>
                        <!-- Input group -->
                        <div class="input-group input-group-merge">
                            <!-- Input -->
                            <input
                                name="password"
                                type="password"
                                class="form-control form-control-appended"
                                placeholder="@lang('nexus::login.password-placeholder')">
                            <!-- Icon -->
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fe fe-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Submit -->
                    <button class="btn btn-lg btn-block btn-primary mb-3">
                        @lang('nexus::login.submit-label')
                    </button>

                    @if (config('nexus.registration_enabled'))
                        <!-- Link -->
                        <div class="text-center">
                            <span class="text-muted text-center">
                                @lang('nexus::login.footer')
                            </span>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <!-- / .row -->
    </div>
    <!-- / .container -->
</div>

@endsection
