@extends('nexus::layouts/app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            @component('nexus::misc/page-title')
                Editar Perfil
            @endcomponent

            @messages

            {{ form()->model(admin(), ['url' => route('profile.update'), 'method' => 'PUT']) }}

                @include('nexus::profile/form')

                <hr>

                @include('nexus::misc/form-buttons', [
                    'cancelRoute' => url()->previous(),
                    'submit' => 'Actualizar Perfil'
                ])

            {{ form()->close() }}
        </div>
        {{-- END col --}}
    </div>
    {{-- END row --}}

@endsection
