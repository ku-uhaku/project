@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    
    <div class="row">
        @include('admin.menuDashboard')
        <div class="col-10">
           <div class="m-2 border p-2">
            <div class="container mh-100">
                <div class="row mb-3 mt-4">
                    <h1>Dashboard</h1>
                </div>
                <h3 class="mb-5">Bienvenue {{ session('user')->user_type }} <span class="text-primary">{{ session('user')->name }}</span></h3>
    
                <p class="text-center mb-5">this is the dashboard page</p>
            </div>
           

           </div>
        </div>
          
    <div>


    
@endsection