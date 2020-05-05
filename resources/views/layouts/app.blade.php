@extends('nexus::layouts/master')

@section('app')
    @include('nexus::layouts/sidebar')

    <!-- MAIN CONTENT
    ================================================== -->
    <div id="app" class="main-content">
        @include('nexus::layouts/nav')

        <div class="container-fluid">
            @yield('content')

            @include('nexus::layouts/footer')
        </div>
    </div>
@endsection
