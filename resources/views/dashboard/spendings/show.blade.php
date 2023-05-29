@extends('layout.layout')

@section('title', 'Gérer les Spendings')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}

        <div class="container">
            <div class="row">
                <h1 class="mb-4 h2 ">Gérer les Spendings</h1>
                <x-alerts></x-alerts>
            </div>
            <div class="row">
                <div class="d-flex justify-content-between  mb-4  align-items-center">
                    <h5>
                        <span>
                            <i class="fas fa-user"></i>
                            Vous visualisez l'utilisateur:
                            <span class="text-primary">{{ $user->name }}</span>
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
                @if ($user->spendings->isNotEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Montant</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>by who</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($spendings as $spending)
                                <tr>
                                    <td>{{ $spending->id }}</td>
                                    <td>{{ $spending->amount_spent }}</td>
                                    <td>{{ $spending->title }}</td>
                                    <td>{{ $spending->user }}</td>

                                    <td>{{ substr($spending->created_at, 0, 10) }}</td>
                                    <td>{{ $spending->admin_name }}</td>
                                    <td>
                                        <a
                                            href="{{ route('spendings.edit', ['spending' => $spending->id, 'user' => $user->id]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @endif
                <div class="row">
                    <a class="btn btn-primary col-3" href="{{ route('spendings.create', ['user' => $user->id]) }}">
                        <i class="fa-solid fa-circle-plus me-2"></i>Créer un spainding
                    </a>
                </div>


            </div>
        </div>







    </main>

@endsection
