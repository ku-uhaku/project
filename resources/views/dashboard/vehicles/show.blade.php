@extends('layout.layout')

@section('title', 'Gérer les Vehicles')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        <div class="container">
            <div class="row my-3">
                <h1 class="mb-4 h2 ">Gérer les vehicles</h1>
                <x-alerts></x-alerts>



            </div>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <strong>
                                <i class="fas fa-id-card"></i>
                                ID:
                            </strong>
                        </td>
                        <td>{{ $vehicle->id }}</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <i class="fas fa-user"></i>
                                title:
                            </strong>
                        </td>
                        <td>{{ $vehicle->title }}</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <i class="fas fa-envelope"></i>
                                Matricule:
                            </strong>
                        </td>
                        <td>{{ $vehicle->matricule }}</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <i class="fas fa-phone"></i>
                                Model:
                            </strong>
                        </td>
                        <td>{{ $vehicle->model }}</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                <i class="fas fa-envelope"></i>
                                instructor:
                            </strong>
                        </td>
                        <td>{{ $vehicle->user->name }}</td>
                    </tr>



                </tbody>
            </table>

        </div>
    </main>
@endsection
