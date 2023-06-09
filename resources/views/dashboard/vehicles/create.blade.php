@extends('layout.layout')

@section('title', 'Gérer les Vehicles')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        <div class="container">
            <div class="row my-3">
                <h1 class="my-4 h2 ">Gérer les Vehicles:</h1>
                <x-alerts></x-alerts>



            </div>

            <div class="row">
                <div class="d-flex justify-content-between  mb-4  align-items-center">
                    <h5>
                        <span>
                            <i class="fas fa-user"></i>
                            Ajouter les Vehicles:
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

            <form action="{{ route('vehicles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ old('title') }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="title" class="form-label">Titre</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" class="form-control" name="matricule" id="matricule"
                                value="{{ old('matricule') }}">
                            @error('matricule')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="matricule" class="form-label">Matricule</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" class="form-control" name="model" id="model"
                                value="{{ old('model') }}">
                            @error('model')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="model" class="form-label">Model</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-outline">
                            <input type="file" class="form-control" name="image" id="image"
                                value="{{ old('image') }}">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="image" class="form-label">Image</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <select name="instructors" id="instructors" class="form-control">
                                <option value="">Instructor</option>

                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                @endforeach
                            </select>
                            @error('model')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="instructors" class="form-label">Instructeur</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Ajouter" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>


    </main>

@endsection
