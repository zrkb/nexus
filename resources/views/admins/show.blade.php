@extends('nexus::layouts/app')

@section('content')

    @include('nexus::misc/models/restore-panel', ['model' => $admin])

    @component('nexus::misc/page-title')
        @slot('superactions')
            <a href="{{ resource('edit', $admin->id) }}" class="btn btn-success">
                <i class="bx bx-pencil mr-2"></i>
                Editar
            </a>

            @include('nexus::components/back-to-resource')

            @include('nexus::misc/models/prev-next-rows', ['model' => $admin])
        @endslot

        <span class="text-primary">#{{ $admin->id }}</span>
        <span class="text-muted">&rarr;</span>
        {{ $admin->fullname }}
    @endcomponent

    @messages

    <div class="row mb-5 justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">
                        <i class="bx bx-layer text-primary mr-2"></i>
                        Datos del Registro
                    </h4>
                </div>

                <div class="card-body">

                    <div class="form mt-3">
                        @modelProperty(['title' => 'Nombre Completo'])
                            {{ $admin->fullname }}
                        @endmodelProperty

                        @modelProperty(['title' => 'Email'])
                            {{ $admin->email }}
                        @endmodelProperty

                        @modelProperty(['title' => 'Roles'])
                            @foreach ($admin->roles as $role)
                                <span class="badge badge-light">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        @endmodelProperty
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-4">
            @include('nexus::misc/models/additional-information', ['model' => $admin])
        </div>
    </div>

    @if ($admin->id != admin()->id)
        <div class="row mb-5 justify-content-center">
            <div class="col-md-12">
                @include('nexus::misc/models/delete-action', ['model' => $admin])
            </div>
        </div>
    @endif

@endsection
