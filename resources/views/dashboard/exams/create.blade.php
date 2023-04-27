@extends('layout.layout')

@section('title', 'Créer un examen')

@section('content')

    <main class="d-flex justify-content-between flex-column">
        <section class="manage-users-section container py-5">
            <h1 class="mb-4 h2 ">Gérer les examens</h1>

            <x-alerts></x-alerts>

            <div class="d-flex justify-content-between mb-3">
                <h2>Créer un examen</h2>
                <a href="{{ route('exams.index') }}" class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    Retour
                </a>
            </div>
            <form action="{{ route('exams.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Title of exam --}}
                <div class="mb-3">
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="title" class="form-label">Titre de l'examen</label>

                </div>

                {{-- L'instructor --}}

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-outline">
                            <select class="form-select" aria-label="Default select example" name="instructor_id">
                                <option selected>Choisir un instructeur</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                @endforeach
                            </select>
                            <label for="instructor" class="form-label">Instructeur</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <select class="form-select" aria-label="Default select example" name="vehicle_id">
                                <option selected>Choisir un véhicule</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->model }}</option>
                                @endforeach
                            </select>

                            @error('vehicle_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="vehicle" class="form-label">Véhicule</label>

                        </div>
                    </div>
                </div>
               

            

                {{-- 5 Students at least --}}
                <div class="p-3 mb-4 bg-light rounded border">
                    <h4 class="mb-3">Étudiants</h4>
                    {{-- Student 1 --}}
                    <div class="mb-3">
                        <label for="student" class="form-label">Étudiant 1</label>
                        <select class="form-select" aria-label="Default select example" name="student_id_1">
                            <option selected>Choisir un étudiant</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>

                        @error('student_id_1')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Student 2 --}}
                    <div class="mb-3">
                        <label for="student" class="form-label">Étudiant 2</label>
                        <select class="form-select" aria-label="Default select example" name="student_id_2">
                            <option selected>Choisir un étudiant</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>

                        @error('student_id_2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Student 3 --}}
                    <div class="mb-3">
                        <label for="student" class="form-label">Étudiant 3</label>
                        <select class="form-select" aria-label="Default select example" name="student_id_3">
                            <option selected>Choisir un étudiant</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>

                        @error('student_id_3')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Student 4 --}}
                    <div class="mb-3">
                        <label for="student" class="form-label">Étudiant 4</label>
                        <select class="form-select" aria-label="Default select example" name="student_id_4">
                            <option selected>Choisir un étudiant</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>

                        @error('student_id_4')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Student 5 --}}
                    <div class="mb-3">
                        <label for="student" class="form-label">Étudiant 5</label>
                        <select class="form-select" aria-label="Default select example" name="student_id_5">
                            <option selected>Choisir un étudiant</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>

                        @error('student_id_5')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Type (drive, code) --}}

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-outline">
                            
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option selected>Choisir un type</option>
                                <option value="drive">Conduite</option>
                                <option value="code">Code</option>
                            </select>

                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="type" class="form-label">Type</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            
                            <input type="text" class="form-control" id="location" name="location"
                                value="{{ old('location') }}">

                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label for="location" class="form-label">Lieu</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-outline">
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">

                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="date" class="form-label">Date</label>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}">

                            @error('time')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="time" class="form-label">Heure</label>

                        </div>
                    </div>
                </div>


                {{-- Submit --}}
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </section>
    </main>

@endsection
