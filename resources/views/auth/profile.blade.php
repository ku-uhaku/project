@extends('layout.layout')

@section('title', 'Profile')

@section('content')

    <section class="profile-section py-3">

        <div class="container">

            <x-alerts></x-alerts>


            <div>
                <h5 class="text-center">Bienvenue <span class="text-primary">{{ Auth::user()->name }}</span></h5>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 ">
                    <div class="card shadow-sm mb-3 ">
                        <div class="card-body " id="profile_btn">
                            <div class="d-flex align-items-center gap-3">
                                <div class="flex-shrink-0">
                                    @if (Auth::user()->image)
                                        <img src="{{ asset('storage/profiles/' . Auth::user()->image) }}" alt="profile"
                                            class="rounded-circle" width="60" height="60">
                                    @else
                                        <img src="{{ asset('images/default-user.png') }}" alt="Image"
                                            class="me-2 rounded-circle" width="60" height="60">
                                    @endif


                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                    <p class="mb-0">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm">
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item">
                                <div id="payment_btn">
                                    <a href="#" class="text-dark">Mon Piemenets</a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div id="exam_btn">
                                    <a href="#" class="text-dark">Mon Exams</a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div id="session_btn">
                                    <a href="#" class="text-dark">Mon Sessions</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 " id="profile">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-3">Mes informations</h5>
                            <form action="{{ route('update-profile', Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">
                                                @if (Auth::user()->image)
                                                    <img src="{{ asset('storage/profiles/' . Auth::user()->image) }}"
                                                        alt="profile" class="rounded-circle" width="100" height="100">
                                                @else
                                                    <img src="{{ asset('images/default-user.png') }}" alt="Image"
                                                        class="me-2 rounded-circle" width="60" height="60">
                                                @endif
                                                <i class="fas fa-camera text-primary position-absolute top-50 start-50 translate-middle p-2 rounded-circle bg-white"
                                                    style="opacity: 0.75;"></i>

                                            </label>

                                            <input type="file" name="image" id="image" class="form-control d-none">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nom</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ Auth::user()->name }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ Auth::user()->email }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Téléphone</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                value="{{ Auth::user()->phone }}">
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Adresse</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="{{ Auth::user()->address }}">
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="birthdate" class="form-label">Date de naissance</label>
                                            <input type="date" name="birthdate" id="birthdate" class="form-control"
                                                value="{{ Auth::user()->birthdate }}">
                                            @error('birthdate')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 d-none" id=payment>
                    @if ($payments)
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="mb-3">Mes paiements</h5>
                                <div class="alert alert-warning" role="alert">
                                    Vous n'avez pas encore effectué de paiement
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card shadow-sm">
                            <table class="table table-striped d-none">
                                <thead>
                                    <tr>
                                        <th scope="col">Montant</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Montant restant</th>
                                        <th scope="col">Date de paiement</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->amount_paid }}</td>
                                            <td>{{ $payment->goal_amount }}</td>
                                            <td>{{ $payment->remaining_amount }}</td>
                                            <td>{{ $payment->payment_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <div class="col-md-8 d-none" id="exam">
                    @if ($exam->count != 0)
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="mb-3">Mes Exams</h5>
                                <div class="alert alert-warning" role="alert">
                                    Vous n'avez pas encore effectué de exam
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card shadow-sm  px-3 py-3">
                            <h3>Exam</h3>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>
                                                <i class="fas fa-user"></i>
                                                L'instructeur:
                                            </strong>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.show', $exam->instructor_id) }}">
                                                {{ $instructor_exam->name }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                <i class="fas fa-car"></i>
                                                Le véhicule:
                                            </strong>
                                        </td>
                                        <td>
                                            <a>
                                                {{ $vehicle->model }}
                                            </a>
                                        </td>
                                    <tr>
                                        <td>
                                            <strong>
                                                <i class="fas fa-clipboard-list"></i>
                                                Titre de l'examen:
                                            </strong>
                                        </td>
                                        <td>{{ $exam->exam_title }}</td>
                                    </tr>
                                    <tr>
                                        <td title="Conduite ou Code">
                                            <strong>
                                                <i class="fas fa-clipboard-list"></i>
                                                Type d'examen:
                                            </strong>
                                        </td>
                                        <td>
                                            @if ($exam->exam_type === 'drive')
                                                <span class="badge bg-primary">Conduite</span>
                                            @else
                                                <span class="badge bg-primary">Code</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Lieu de l'examen:
                                            </strong>
                                        </td>
                                        <td>{{ $exam->exam_location }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                <i class="fas fa-calendar-alt"></i>
                                                Date de l'examen:
                                            </strong>
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($exam->exam_date)->format('d/m/Y') }}
                                            à
                                            {{ \Carbon\Carbon::parse($exam->exam_time)->format('H:i') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <div class="col-md-8 d-none" id="session">
                    @empty($sessionArray)
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="mb-3">Mes sessions</h5>
                                <div class="alert alert-warning" role="alert">
                                    Vous n'avez pas encore effectué de session
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card shadow-sm  px-3 py-3">
                            <h3>Session {{ count($sessionArray) }}</h3>
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Insrectors</th>
                                        <th>Heure</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                @foreach ($sessionArray as $sessions)
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ $sessions['session']->title }}
                                            </td>
                                            <td>
                                                {{ $sessions['instructor_session']->name }}
                                            </td>
                                            <td>
                                                {{ $sessions['session']->session_time }}
                                            </td>
                                            <td>
                                                {{ $sessions['session']->session_date }}
                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    @endempty
                </div>
            </div>
        </div>
    </section>

@endsection


@push('scripts')
    <script>
        const profile = document.getElementById('profile');
        const payment = document.getElementById('payment');
        const exam = document.getElementById('exam');
        const session = document.getElementById('session');
        const profileBtn = document.getElementById('profile_btn')
        const paymentBtn = document.getElementById('payment_btn')
        const examBtn = document.getElementById('exam_btn')
        const sessionBtn = document.getElementById('session_btn')

        profileBtn.addEventListener('click', () => {
            profile.classList.remove('d-none')
            payment.classList.add('d-none')
            exam.classList.add('d-none')
            session.classList.add('d-none')
        })
        paymentBtn.addEventListener('click', () => {
            payment.classList.remove('d-none')
            profile.classList.add('d-none')
            exam.classList.add('d-none')
            session.classList.add('d-none')
        })
        examBtn.addEventListener('click', () => {
            exam.classList.remove('d-none')
            payment.classList.add('d-none')
            profile.classList.add('d-none')
            session.classList.add('d-none')
        })
        sessionBtn.addEventListener('click', () => {
            session.classList.remove('d-none')
            payment.classList.add('d-none')
            exam.classList.add('d-none')
            profile.classList.add('d-none')
        })
    </script>
@endpush
