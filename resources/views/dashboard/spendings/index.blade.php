@extends('layout.layout')

@section('title', 'Gérer les Paiements')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}

        <div class="container">
            <div class="row">
                <h1 class="my-4 h2 ">Gérer les Salaires des travailleurs</h1>
                <x-alerts></x-alerts>
            </div>
            <div class="row mb-3">
                <form action="{{ route('spendings.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by name...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="search-btn" type="submit">
                                <i class="fas fa-search"></i>
                                Rechercher
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-primary">
                                <i class="fas fa-sync-alt"></i>
                                Actualiser
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between  mb-4  align-items-center">
                    <h5>
                        <span>
                            <i class="fas fa-user"></i>
                            Vous visualisez Salaires des travailleurs: ( {{ $spendings->count() }} )
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
                @if ($spendings->isNotEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Titre</th>
                                <th>Montant</th>
                                <th>Date de paiement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spendings as $spending)
                                <tr>
                                    <td>{{ $spending->user_id }}</td>
                                    <td>{{ $spending->user_name }}</td>
                                    <td>{{ $spending->title }}</td>
                                    <td>{{ $spending->amount_spent }}</td>
                                    <td>{{ substr($spending->created_at, 0, 10) }}</td>
                                    <td>
                                        <a href="{{ route('spendings.show', ['spending' => $spending->user->id]) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('spendings.create', ['user' => $spending->user_id]) }}">
                                            <i class="fa-solid fa-circle-plus me-2"></i>

                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        Aucun Salaires des travailleurs n'a été trouvé.
                    </div>
                @endif
            </div>
        </div>








    </main>

@endsection
