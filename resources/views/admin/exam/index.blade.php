@extends('layout.layout')

@section('title', 'Admin Dashboard - Manage Users')

@section('content')
<div class="row">
    @include('admin.menuDashboard')
    <div class="col-10">
       <div class="m-2 border p-2">
        <div class="container mh-100 ">
            <div class="row d-flex d-flex justify-content-between  align-items-center mb-4">
                <div class="col-5">
                    <h1 class="mt-3 ">Manage Exames</h1>
                </div>
                <div class="col-3">
                    <a href="{{ route('admin.exams.create') }}" class="btn btn-primary p-2">ajouter un exam </a>

                </div>
            </div>

           
                    
        </div>
       
       </div>
    </div>  
<div>

    
@endsection