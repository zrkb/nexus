@extends('nexus::layouts/boxed')

@section('boxed')

    <!-- Card -->
    <div class="card" style="margin-top: 70px">
        <div class="card-body text-center">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-xl-8">
                    <!-- Image -->
                    <img src="{{ assets_path() . '/assets/img/illustrations/unauthorized.svg' }}" alt="Error" class="img-fluid" style="max-width: 250px; margin-top: 35px; margin-bottom: 50px;">

                    @isset($preTitle)
                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            {{ $preTitle }}
                        </h6>
                    @endisset

                    <!-- Title -->
                    <h1 class="header-title mb-3">
                        Acceso Denegado
                    </h1>

                    @isset($message)
                        <!-- Content -->
                        <p class="text-muted mb-5">
                            {{ $message }}
                        </p>
                    @endisset
                </div>
            </div> <!-- / .row -->
        </div>
    </div>
@endsection
