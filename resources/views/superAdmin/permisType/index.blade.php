@extends('layout.layout')

@section('title', 'Gérer les types de permis')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        <div class="container">
            <div class="row my-3">
                <h1 class="my-4 h2 ">Gérer les Vehicles:</h1>
                <x-alerts></x-alerts>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between  mb-4  align-items-center">
                    <h5>
                        <span>
                            <i class="fas fa-user"></i>
                            Ajouter les Vehicles:
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
        </div>
    </main>
@endsection
