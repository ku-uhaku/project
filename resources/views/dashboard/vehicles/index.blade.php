@extends('layout.layout')

@section('title', 'Gérer les Vehicles')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        <div class="container">
            <div class="row my-3">
                <h1 class="mb-4 h2 ">Gérer les vehicle</h1>
                <x-alerts></x-alerts>



            </div>

            <div class="row">
                <div class="d-flex justify-content-between  mb-4  align-items-center">
                    <h5>
                        <span>
                            <i class="fas fa-user"></i>
                            Gérer les vehicles :
                            <span class="text-primary"></span>
                        </span>


                    </h5>
                    <div>
                        <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-primary float-end">
                            <i class="fas fa-arrow-left"></i>
                            Retour
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <table class=" table table-striped table-responsive fs-6 ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matricule</th>
                            <th>Titre</th>
                            <th>Modèle</th>
                            <th>Instructeur</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->id }}</td>
                                <td>{{ $vehicle->matricule }}</td>
                                <td>{{ $vehicle->title }}</td>
                                <td>{{ $vehicle->model }}</td>
                                <td>{{ $vehicle->user->name }}</td>
                                <td>

                                    <a href="{{ route('vehicles.show', $vehicle->id) }}" class=" text-primary">
                                        <i class="fas fa-eye"></i></a>

                                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class=" text-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </table>

                <div class="row my-3">
                    <div class="col-3">
                        <a href="{{ route('vehicles.create') }}" class="btn btn-primary">
                            <i class="fa-solid fa-circle-plus"></i>
                            Ajouter un vehicle
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
