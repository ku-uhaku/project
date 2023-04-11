@extends('layout.layout')

@section('title', 'Admin Dashboard - Manage Users')

@section('content')
<div class="row">
    @include('admin.menuDashboard')
    <div class="col-10">
       <div class="m-2 border p-2">
        <div class="container mh-100 ">
            <div class="row d-flex d-flex justify-content-between  align-items-center mb-4">
                <div class="col-9">
                    <h1 class="mt-3 ">Show Payment for {{ $user->name }}</h1>
                </div>
                
            </div>
            <div class="row">
                @if ($user->payments->isNotEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">amount</th>
                                <th scope="col">date</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->payments as $payment)
                                <tr>
                                    <th scope="row">{{ $payment->id }}</th>
                                    <td>{{ $payment->amount_paid }}</td>
                                    <td>{{ $payment->created_at }}</td>
                                    
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                @else
                    <p class="mt-3 ">No Payment for {{ $user->name }}</p>
                @endif
            </div>
            <div class="row">
                <a class="btn btn-primary mb-4" href="{{ route('admin.payments.create', ["user"=>$user]) }}">Show Payment</a>
            </div>

            
                    
        </div>
       
       </div>
    </div>  
<div>

    
@endsection