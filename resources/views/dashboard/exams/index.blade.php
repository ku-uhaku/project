@extends('layout.layout')

@section('title', 'Gérer les examens')

@section('content')
    <main class="">

        <section class="manage-users-section container">
            <h1 class="mb-4 h2 ">Gérer les examens</h1>

            <x-alerts></x-alerts>

            @if (count($exams) > 0)
                <div class="mb-3  p-3 rounded-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>
                            <i class="fa-solid fa-car-side"></i>
                            Gérer les examens
                            ({{ count($exams) }})
                        </h5>
                        <a href="{{ route('exams.create') }}" class="btn btn-primary d-flex align-items-center shadow-sm">
                            <i class="fa-solid fa-circle-plus me-2"></i>
                            Ajouter un examen
                        </a>
                    </div>
                </div>

                
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Lieu</th>
                                <th>L'instructeur</th>
                                <th>Nb Etudent</th>
                                <th>Acions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $exam->id }}</td>
                                    <td>{{ $exam->exam_title }}</td>
                                    <td>{{ $exam->exam_date }}</td>
                                    <td>{{ $exam->exam_time }}</td>
                                    <td>{{ $exam->exam_location }}</td>
                                    <td>{{ $exam->instructor_name }}</td>
                                    <td>{{ $exam->students_count }}</td>
                                    <td class="d-flex align-items-center gap-2">
                                        <a class="py-3" href="{{ route('exams.show', $exam->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="py-3" href="{{ route('exams.edit', $exam->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('exams.destroy' , $exam->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <h2 class="text-center">Aucun examen n'a été trouvé</h2>
                </div>
                <a href="{{ route('exams.create') }}" class="btn btn-primary d-flex align-items-center">
                    Créer un examen
                </a>
            @endif
        </section>
    </main>

@endsection
