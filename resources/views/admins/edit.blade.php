@extends('nexus::layouts/app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            @component('nexus::misc/page-title')
                @slot('superactions')
                    @include('nexus::components/back-to-resource')
                @endslot

                Editar Usuario
            @endcomponent

            @messages

            {{ form()->model($admin, ['route' => ['admins.update', $admin->id], 'method' => 'PUT']) }}

                @include('nexus::admins/form')

                <hr>

                @include('nexus::misc/form-buttons')

            {{ form()->close() }}
        </div>
        {{-- END col --}}
    </div>
    {{-- END row --}}

@endsection
