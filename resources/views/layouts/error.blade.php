@extends('nexus::layouts/master')

@section('app')

<div class="d-flex align-items-center bg-auth border-top border-top-2 border-primary min-vh-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
                <!-- Image -->
                <div class="text-center">
                    <img src="{{ assets_path() }}/assets/img/illustrations/lost.svg" alt="..." class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
                
                <div class="text-center">
                    
                    @isset($pretitle)
                        <!-- Preheading -->
                        <h6 class="text-uppercase text-muted mb-4">
                            {{ $pretitle }}
                        </h6>
                    @endisset

                    <!-- Heading -->
                    <h1 class="display-4 mb-3">
                        {{ $title }} 😭
                    </h1>

                    <!-- Subheading -->
                    <p class="text-muted mb-4">
                        {{ $message }}
                    </p>
                    <!-- Button -->

                    @isset($url)
                        <a href="{{ $url }}" class="btn btn-primary">
                            {{ $buttonTitle }}
                        </a>
                    @endisset
                    
                </div>
            </div>
        </div>
        <!-- / .row -->
    </div>
</div>

@endsection
