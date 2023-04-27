@extends('layout.layout')

@section('title', 'Gérer les Paiements')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}
     
            <div class="container">
                <div class="row">
                    <h1 class="mb-4 h2 ">Gérer les payments</h1>
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
                    @if ($user->payments->isNotEmpty())
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">rest</th>
                                    <th scope="col">date</th>
            
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->payments as $payment)
                                    <tr>
                                        <th>{{ $payment->id }}</th>
                                        <td>{{ $payment->amount_paid }}</td>
                                        <td>{{ $payment->goal_amount }}</td>
                                        <td>{{ $payment->remaining_amount }}</td>
                                        <td>{{ $payment->payment_date }}</td>
                                        
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class=" d-flex justify-content-start gap-2  mb-4  align-items-center">
                            {{-- {{ dd($user->payment) }} --}}
                            <div class="">
                                <a  class="btn btn-primary" href="{{ route('payment.create',  ["user" => $user->id]) }}">
                                    <i class="fa-solid fa-circle-plus me-2"></i>     Ajouter un nouveau paiement
                                </a>
                            </div>
                            <div class="">
                                <a  class="btn btn-info" href="{{ route('payments.edit',  ["payment" => $user->payments->first()->id, 'user' => $user->id]) }}">
                                    <i class="fa-solid fa-circle-plus me-2"></i>     Modifier ce paiement
                                </a>
                            </div>
                        </div>
                    @else
                        <p class="mt-3 ">No Payment for {{ $user->name }}</p>

                        <div class="row">
                            <a  class="btn btn-primary" href="{{ route('payments.create', ["user" => $user->id]) }}">
                                <i class="fa-solid fa-circle-plus me-2"></i>     Créer un paiement 
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        
    
    </main>

@endsection


