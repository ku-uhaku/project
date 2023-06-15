@extends('layout.layout')

@section('title', 'Tableau de bord')

@section('content')

    <section class="admin-dashboard-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Bonjour, {{ Auth::user()->name }}!</h1>
                </div>
                <div class="col-12">
                    <p class="text-center">Bienvenue sur votre tableau de bord.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12 mx-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('users.index') }}" class="btn btn-primary py-2">Utilisateurs</a>
                        <a href="{{ route('exams.index') }}" class="btn btn-primary py-2">Examens</a>
                        <a href="{{ route('sessions.index') }}" class="btn btn-primary py-2">Sessions</a>
                        <a href="{{ route('payments.index') }}" class="btn btn-primary py-2">Paiement</a>
                        <a href="{{ route('spendings.index') }}" class="btn btn-primary py-2">
                            Dépenses</a>
                        <a href="{{ route('vehicles.index') }}" class="btn btn-primary py-2">Vehicules</a>
                        <a href="{{ route('bills.index') }}" class="btn btn-primary py-2">Facture</a>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
