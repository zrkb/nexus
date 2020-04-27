@extends('nexus::layouts/master')

@section('app')

<div class="d-flex align-items-center bg-auth border-top border-top-4 border-primary min-vh-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-10 col-md-8 col-lg-6 col-xl-5 mx-auto">

                <div class="text-center">

                    @isset($pretitle)
                        <!-- Preheading -->
                        <h5 class="text-uppercase text-muted mb-4 font-weight-normal">
                            {{ $pretitle }}
                        </h5>
                    @endisset

                    <!-- Heading -->
                    <h1 class="display-4 mb-4">
                        {{ $title ?? 'Lo sentimos' }}
                    </h1>

                    @isset($message)
                        <!-- Subheading -->
                        <p class="mb-4">
                            {{ $message }}
                        </p>
                    @endisset

                    <!-- Button -->
                    <a href="{{ $url ?? url()->previous() }}" class="btn btn-link btn-lg py-4 px-5">
                        {{ $buttonTitle ?? 'Volver Atrás' }}
                        <i class='bx bx-chevron-right'></i>
                    </a>

                </div>
            </div>
        </div>
        <!-- / .row -->
    </div>
</div>

@endsection
