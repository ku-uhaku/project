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
                                Gérer payment de {{ $user->name  }}:
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
                <div class="row">
                    <div class="d-flex justify-content-start align-items-center mt-3">
                        <div>
                            @empty($user->image)
                                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                            alt="Image" width="100" height="100" class="rounded-circle">
                            @else
                                        <img src="{{ asset('storage/profiles/' . $user->image) }}" alt="Image" width="100" height="10">
                            @endempty
                        </div>
                        <div class="ms-3">
                            <h5 class="text-capitalize">{{ $user->name }}</h5>
                            <p class="text-capitalize">@if ($user->type == 'admin')
                                <span class="badge bg-danger">Administrateur</span>
                            @elseif($user->type == 'student')
                                <span class="badge bg-primary">Étudiant</span>
                            @elseif($user->type == 'instructor')
                                <span class="badge bg-success">Instructeur</span>
                            @endif</p>
                        </div>
                        
                    </div>
                   

                    
                </div>
                <div class="row my-5">
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="total" id="total" value="{{ optional($user->payments->last())->goal_amount ?? ''}}">
                                    @error('total')
                                        <small class="text-danger">{{ $message }}</small> 
                                    @enderror
                                    <label for="total" class="form-label">Total</label>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                    <label for="date" class="form-label">Date</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-circle-plus me-2"></i>
                            Ajouter</button>
                    </form>
                </div>

                
            </div>
        
    
    </main>

@endsection




s