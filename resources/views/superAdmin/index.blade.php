@extends('layout.layout')

@section('title', 'Super Admin View ')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}

        <section class="manage-users-section container py-3">
            <h1 class="mb-4 mt-4 h2 ">Super Admin View</h1>
            <x-alerts></x-alerts>


            <div class="row">
                <h4>filter Utilisateur</h4>
            </div>

            <div class="row filters py-3 border-bottom border-top">
                <form action="{{ route('superadmin.filter') }}" method="get">


                    <div class="row">
                        {{-- <div class="row mb-3">
                            {{ count(request()->all()) > 0
                                ? 'You filtered by: ' .
                                    implode(
                                        ' and ',
                                        array_keys(
                                            array_filter(request()->all(), function ($key) {
                                                return $key !== 'page';
                                            }),
                                        ),
                                    )
                                : '' }}
                        </div> --}}
                        <div class="col">
                            <div class="input-group">
                                {{-- if was in irl select the that value --}}
                                <select name="year" class="form-control">
                                    <option value="">All Years</option>
                                    @for ($i = date('Y'); $i >= 2020; $i--)
                                        <option value="{{ $i }}"
                                            {{ request()->input('year') == $i ? 'selected' : '' }}>{{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <select name="month" class="form-control">
                                    <option value="">All Months</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}"
                                            {{ request()->input('month') == $i ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <select name="day" id="day" class="form-control">
                                    <option value=""> Day</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                            {{ request()->input('day') == $i ? 'selected' : '' }}>
                                            {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <select name="admin" id="admin" class="form-control">
                                    <option value="">---admin</option>
                                    @foreach ($admins as $admin)
                                        <option value="{{ $admin->id }}"
                                            {{ request()->input('admin') == $admin->id ? 'selected' : '' }}>
                                            {{ $admin->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group">
                                <select name="type" id="type" class="form-control">
                                    <option value="" {{ request()->input('type') == '' ? 'selected' : '' }}> Type
                                    </option>
                                    <option value="admin" {{ request()->input('type') == 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="instructor"
                                        {{ request()->input('type') == 'instructor' ? 'selected' : '' }}>
                                        Instructor</option>
                                    <option value="student" {{ request()->input('type') == 'student' ? 'selected' : '' }}>
                                        Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

            <div class="row g-3 mt-3">
                <div class="col-md-12">
                    <div>
                        <h5>
                            <i class="fas fa-users"></i>
                            Vous visualisez l'utilisateur: ({{ isset($users) ? $users->total() : '0' }})

                        </h5>
                    </div>

                    <div>
                        @if (isset($users))
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>

                                        <th scope="col">Nom Complet</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Créé à</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>

                                            <td scope="row">{{ $user->id }}</td>

                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->type }}</td>
                                            <td>{{ $user->created_at->format('Y/m/d') }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- pagination link --}}
                            {{ $users->appends(request()->input())->links() }}
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i>
                                Aucun Utilisateur trouvé
                            </div>
                        @endif
                    </div>


                </div>
            </div>




        </section>
    </main>
@endsection
