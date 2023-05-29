@extends('layout.layout')

@section('title', 'Gérer les Paiements')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}

        <div class="container">
            <div class="row">
                <h1 class="mb-4 h2 ">Gérer les bills</h1>
                <x-alerts></x-alerts>
            </div>
            <div class="row mb-3">
                {{-- <form action="{{ route('payments.index') }}" method="GET">
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
                </form> --}}

            </div>
            <div class="row">
                <div class="d-flex justify-content-between  mb-4  align-items-center">
                    <h5>
                        <span>
                            <i class="fas fa-user"></i>
                            Vous visualisez bills: ({{ $bills->count() }})
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

            @if ($bills->count() != 0)
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Amount</th>
                                <th>description</th>
                                <th>by who</th>
                                <th>Crée on</th>

                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $bill->id }}</td>

                                    <td>{{ $bill->title }}</td>
                                    <td>{{ $bill->amount }}</td>
                                    <td>{{ substr($bill->description, 0, 20) }}</td>
                                    <td>{{ $bill->user->name }}</td>
                                    <td>{{ substr($bill->created_at, 0, 10) }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('bills.edit', $bill->id) }}">
                                                <i class="text-primary fas fa-edit fa-1x me-1"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- <div class="d-flex justify-content-center">
                        {{ $bills->links() }}
                    </div> --}}
                </div>
            @else
                <p>No Bills yet</p>
            @endif
            <div class=" ">
                <a href="{{ route('bills.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-1"></i>
                    Ajouter un bill
                </a>
            </div>

        </div>




    </main>

@endsection
