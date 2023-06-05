@extends('layout.layout')

@section('title', 'Gérer les Paiements')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}

        <div class="container">
            <div class="row">
                <h1 class="my-4 h2 ">Gérer les paiements</h1>
                <x-alerts></x-alerts>



            </div>
            <div class="row">
                <div class="d-flex justify-content-between  align-items-center">
                    <h5>
                        <span>
                            <i class="fas fa-user"></i>
                            Vous visualisez les paiements de l'utilisateur :
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
                <div class="d-flex justify-content-start align-items-center my-3">
                    <div>
                        @empty($user->image)
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                alt="Image" width="100" height="100" class="rounded-circle">
                        @else
                            <img src="{{ asset('storage/profiles/' . $user->image) }}" alt="Image" width="100"
                                height="10">
                        @endempty
                    </div>
                    <div class="ms-3">
                        <h5 class="text-capitalize">{{ $user->name }}</h5>
                        <p class="text-capitalize">
                            @if ($user->type == 'admin')
                                <span class="badge bg-danger">Administrateur</span>
                            @elseif($user->type == 'student')
                                <span class="badge bg-primary">Étudiant</span>
                            @elseif($user->type == 'instructor')
                                <span class="badge bg-success">Instructeur</span>
                            @endif
                        </p>
                    </div>

                </div>



            </div>

            <div class="row">
                @if ($user->payments->isNotEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Total</th>
                                <th scope="col">Montant restant</th>
                                <th scope="col">Date de paiement</th>
                                <th scope="col">Par qui</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <th>{{ $payment->id }}</th>
                                    <td>{{ $payment->amount_paid }}</td>
                                    <td>{{ $payment->goal_amount }}</td>
                                    <td>{{ $payment->remaining_amount }}</td>
                                    <td>{{ $payment->payment_date }}</td>
                                    <td>{{ $payment->admin_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class=" d-flex justify-content-start gap-2  mb-4  align-items-center">
                        {{-- {{ dd($user->payment) }} --}}
                        <div class="">
                            <a class="btn btn-primary" href="{{ route('payment.create', ['user' => $user->id]) }}">
                                <i class="fa-solid fa-circle-plus me-2"></i> Ajouter un nouveau paiement
                            </a>
                        </div>
                        <div class="">
                            <a class="btn btn-info"
                                href="{{ route('payment.pdf', ['payment' => $user->payments->first()->id, 'user' => $user->id]) }}">
                                <i class="fa-solid fa-circle-plus me-2"></i> Modifier ce paiement
                            </a>
                        </div>
                        <div class="">
                            <a class="btn btn-primary" href="{{ route('payment.pdf', ['user' => $user->id]) }}">
                                <i class="fa-solid fa-circle-plus me-2"></i> Gerée un PDF
                            </a>
                        </div>
                    </div>
                @else
                    <p class="mt-3 ">No Payment for {{ $user->name }}</p>

                    <div class="d-flex gap-3">
                        <div class="">
                            <a class="btn btn-primary" href="{{ route('payments.create', ['user' => $user->id]) }}">
                                <i class="fa-solid fa-circle-plus me-2"></i> Créer un paiement
                            </a>
                        </div>

                    </div>
                @endif
            </div>
        </div>


    </main>

@endsection
