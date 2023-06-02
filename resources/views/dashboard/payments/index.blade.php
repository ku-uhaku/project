@extends('layout.layout')

@section('title', 'Gérer les Paiements')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}

        <div class="container">
            <div class="row">
                <h1 class="my-4 h2 ">Gérer les paiements</h1>
                <x-alerts class=" mb-3 h2"></x-alerts>
            </div>
            <div class="row mb-3">
                <form action="{{ route('payments.index') }}" method="GET">
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
                            Vous visualisez paiement des utilisateurs: ({{ $payments->count() }})
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

            @if ($payments->count() != 0)
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Montant</th>
                                <th>Total</th>
                                <th>Montant restant</th>
                                <th>Date de paiement</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $student)
                                <tr>
                                    <td>{{ $student->user_name }}</td>
                                    <td>{{ $student->amount_paid ?? 0 }}</td>
                                    <td>{{ $student->last_goal_amount ?? 0 }}</td>
                                    <td>{{ $student->remaining_amount ?? 0 }}</td>
                                    <td>{{ $student->latest_payment_date ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('payments.show', ['payment' => $student->user_id]) }}"
                                            class="py-3">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            @else
                <p>Non payments</p>
            @endif

        </div>


    </main>

@endsection
