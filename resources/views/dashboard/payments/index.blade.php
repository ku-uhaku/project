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
                                Vous visualisez payment les utilisateurs:  ({{ $students->count() }})
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

                @if($students->count() != 0 )
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Amount</th>
                                <th>Total</th>
                                <th>Remaining Amount</th>
                                <th>Payment Date</th>   
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->payments->first()->amount_paid ?? 0 }}</td>
                                    <td>{{ $student->payments->first()->total_amount ?? 0 }}</td>
                                    <td>{{ $student->payments->first()->remaining_amount ?? 0 }}</td>
                                    <td>{{ $student->payments->first()->latest_payment_date ?? '-' }}</td>
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




