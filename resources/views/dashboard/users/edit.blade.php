@extends('layout.layout')

@section('title', 'Modifier l\'utilisateur')

@section('content')

    <main class="d-flex justify-content-between container flex-column  mt-3">
        <h1 class="mb-4 h2 ">Modifier l'utilisateur</h1>
        <h5 class="my-3 rounded-3">
            <div class="d-flex justify-content-between">
                <div>
                    Vous êtes en train de modifier l'utilisateur
                    <a href="{{ route('users.show', $user->id) }}">
                        {{ $user->name }}
                    </a>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('users.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        <span>
                            Retour
                        </span>
                    </a>
                </div>
            </div>

            

            
        </h5>

        

        <div>
            <form id="updateuserform" action="{{ route('users.update', $user->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justifuy-content-start align-items-center">
                        <div class="mb-1">
                            <label for="image" class="form-label">
                                @if ($user->image)
                                    <img src="{{ asset('storage/profiles/' . $user->image) }}" alt="Profile Image" width="100"
                                        height="100" class="mb-3 rounded-circle">
                                @else
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                        alt="Profile Image" width="100" height="100" class="mb-3 rounded-circle">
                                @endif
                            </label>
                            <input class="form-control d-none" type="file" id="image" name="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                    
                       
                        
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Dropdown button
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="#">
                            <div>
                                <i class="fas fa-chalkboard-teacher"></i>
                            <span>
                                Les seances
                            </span>
                            </div>
                            </a></li>
                          <li><a class="dropdown-item" href="#">
                            <div>
                                <i class="fa-solid fa-car"></i>
                                    <span>
                                        Les examens
                                    </span>
                            </div></a></li>
                          <li><a class="dropdown-item" href="#">
                            <div>
                                <i class="fa-regular fa-credit-card"></i>
                                <span>
                                    Les paiements
                                </span></div>    
                            </a></li>
                        </ul>
                      </div>
                </div>
                {{-- <div class="d-flex justifuy-content-start align-items-center">
                    <div class="mb-1">
                        <label for="image" class="form-label">
                            @if ($user->image)
                                <img src="{{ asset('storage/profiles/' . $user->image) }}" alt="Profile Image" width="100"
                                    height="100" class="mb-3 rounded-circle">
                            @else
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                    alt="Profile Image" width="100" height="100" class="mb-3 rounded-circle">
                            @endif
                        </label>
                        <input class="form-control d-none" type="file" id="image" name="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                </div> --}}

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="name" class="form-label">
    
                                <span>Nom </span>
                            </label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-outline">
                            
                            <input type="text" class="form-control" id="name" name="" disabled value="{{ $user->name }}">
        
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="name" class="form-label">
                             
                                <span>Prenom </span>
                            </label>
                        </div>

                    </div>
                    
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            
                            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
        
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="address" class="form-label">
                                
                                <span>Adresse</span>
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            
                            <input type="date" class="form-control" id="birthdate" name="birthdate"
                                value="{{ $user->birthdate }}">
        
                            @error('birthdate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="birthdate" class="form-label">
                        
                                <span>Date de naissance</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="mb-3">
                   
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="email" class="form-label">
                            <span>Addresse Email</span>
                        </label>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="mb-3">
                    
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
    
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="phone" class="form-label">
                            <span>Numéro de téléphone</span>
                        </label>
                    </div>
                </div>
    
                
                <div class="d-flex justfuy-content-start gap-3">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-edit"></i>
                            <span>
                                Modifier l'utilisateur
                            </span>
                        </button>
                    </div>
                   <div class="">
                        <form id="deleteuserform" action="{{ route('users.destroy', $user->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <div>                
                                    <button type="submit" class="btn btn-danger align-self-start">
                                        <i class="fas fa-trash"></i>
                                        <span>
                                            Supprimer l'utilisateur
                                        </span>
                                    </button>
                            </div>
                        </form>
                   </div>
                </div>
                
            </form>
        </div>
        

        {{-- <x-alerts></x-alerts> --}}

 



        {{-- Back button --}}

        <section class="mt-4 py-2">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('users.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                    <span>
                        Retour
                    </span>
                </a>
            </div>
        </section>

    </main>

@endsection
