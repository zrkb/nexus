@extends('nexus::layouts/master')

@section('app')

<div class="container my-4 py-4">
    <div class="row align-items-center">
        <div class="col-10 col-md-5 col-lg-4 my-5 mx-auto" style="max-width: 350px;">

            <div class="row">
                <div class="col-12">
                    <div class="card-wrapper">
                        @include('nexus::layouts/errors')
                    </div>
                </div>
            </div>

            @yield('auth')
        </div>
    </div>
    <!-- / .row -->
</div>
<!-- / .container -->

@endsection
