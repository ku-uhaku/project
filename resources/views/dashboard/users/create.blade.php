@extends('layout.layout')

@section('title', 'Créer un utilisateur')

@section('content')

    <main class="d-flex justify-content-between flex-column">
        <section class="manage-users-section container py-5">

            {{-- <x-alerts></x-alerts> --}}

            <div class="d-flex justify-content-between mb-4">
                <h2>Créer un utilisateur</h2>
                <a href="{{ route('users.index') }}" class="btn btn-primary d-flex align-items-center">
                    Retour
                </a>
            </div>
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-outline">
                             <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                             @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                             <label for="name" class="form-label">Nom</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" class="form-control" disabled id="prenom" name="" value="{{ old('') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="name" class="form-label">Prenom</label>
                            
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-outline">
                            <input type="date" class="form-control" id="birthdate" name="birthdate"
                                value="{{ old('birthdate') }}">
                            @error('birthdate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="address" class="form-label">Date de naissance</label>
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        <label for="phone" class="form-label">Telephone</label>

                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-outline">
                            <input type="string" class="form-control" id="address" name="address" value="{{ old('address') }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="address" class="form-label">Adresse</label>
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="address" class="form-label">Photo</label>

                           
                        </div>
                        
                    </div>
                </div>
               
                <div class="mb-3">
                    
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="name" class="form-label">
                        Adresse email
                    </label>

                    
                </div>
              
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="address" class="form-label">Mot de passe</label>

                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="address" class="form-label">Confirmer le mot de passe</label>

                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="type">
                        <option value="admin">Admin</option>
                        <option value="instructor">Instructor</option>
                        <option value="student" selected>Student</option>
                    </select>
                    @error('type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="type" class="form-label">Type</label>

                </div>
               
                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </section>
    </main>

@endsection

@push('scripts')
    <script>
        const password = document.getElementById('password');
        const passwordConfirmation = document.getElementById('password_confirmation');

        passwordConfirmation.addEventListener('input', () => {
            if (password.value !== passwordConfirmation.value) {
                passwordConfirmation.setCustomValidity('Les mots de passe ne correspondent pas');
            } else {
                passwordConfirmation.setCustomValidity('');
            }
        });

        password.addEventListener('input', () => {
            if (password.value !== passwordConfirmation.value) {
                passwordConfirmation.setCustomValidity('Les mots de passe ne correspondent pas');
            } else {
                passwordConfirmation.setCustomValidity('');
            }
        });
    </script>
@endpush
