@extends('layout.layout')

@section('title', 'Admin Dashboard - Manage Users')

@section('content')
<div class="row">
    @include('admin.menuDashboard')
    <div class="col-10">
       <div class="m-2 border p-2">
        <div class="container mh-100 ">
            <div class="row">
                <h1>{{ $user->name }}</h1>
    <img src="{{ asset('storage/'.$user->image) }}" alt="hello"/>


@if ($user->payments->isNotEmpty())
    <h2>Payments</h2>
    <ul>
        @foreach ($user->payments as $payment)
            <li>
                Paid: {{ $payment->amount_paid }} / Goal: {{ $payment->goal_amount }}<br>
                Remaining: {{ $payment->remaining_amount }}<br>
                Date: {{ $payment->payment_date }}
            </li>
        @endforeach
    </ul>
@endif

            </div>
            <div class="row">
             
            </div>
        </div>
       

       </div>
    </div>
      
<div>

    
@endsection