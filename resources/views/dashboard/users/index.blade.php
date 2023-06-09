@extends('layout.layout')

@section('title', 'Gérer les utilisateurs')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}

        <section class="manage-users-section container py-3">
            <h1 class="mb-4 h2 ">Gérer des utilisateurs</h1>

            <x-alerts></x-alerts>

            <form class="input-group mb-3" method="GET" action="{{ route('users.index') }}">
                <input type="text" class="form-control" placeholder="Rechercher un utilisateur" name="search"
                    value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="search-btn" type="submit">
                        <i class="fas fa-search"></i>
                        Rechercher
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">
                        <i class="fas fa-sync-alt"></i>
                        Actualiser
                    </a>
                </div>
            </form>


            @if (count($users) > 0)
                <div class="mb-1 p-3 ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>
                            <i class="fas fa-users me-2"></i>
                            Gérer les utilisateurs ({{ $users->total() }})
                        </h5>
                        <a href="{{ route('users.create') }}" class="btn btn-primary d-flex align-items-center shadow-sm">
                            <i class="fa-solid fa-circle-plus me-2"></i>
                            Ajouter un utilisateur
                        </a>
                    </div>
                </div>

                <div class="table-responsive table-responsive-md ">
                    <table class="table table-striped table-responsive fs-6">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Nom Complet</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Type</th>
                                <th scope="col">Créé à</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    @empty($user->image)
                                        <td><img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                                                alt="Image" width="50" height="50">
                                        </td>
                                    @else
                                        <td><img src="{{ asset('storage/profiles/' . $user->image) }}" alt="Image"
                                                width="50" height="50">
                                        @endempty
                                    <td class="align-middle">
                                        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                                    </td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle">{{ $user->phone }}</td>
                                    <td class="align-middle">{{ substr($user->address, 0, 20) }}</td>
                                    <td class="align-middle text-capitalize">{{ $user->type }}</td>
                                    <td class="align-middle">{{ substr($user->created_at, 0, 10) }}</td>
                                    <td class=" align-middle d-flex justify-content-around align-items-center">
                                        <a href="{{ route('users.show', $user->id) }}" class="py-3">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('users.edit', $user->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>


                                        @if ($user->type == 'admin' || $user->type == 'instructor')
                                            <a href="{{ route('spendings.show', $user->id) }}">
                                                <i class="fas fa-money-bill-wave"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('payments.show', $user->id) }}">
                                                <i class="fas fa-money-bill-wave"></i>
                                            </a>
                                        @endif
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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

                <div class="d-flex justify-content-center mt-3">
                    {{ $users->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    <h2 class="text-center">Aucun utilisateur trouvé</h2>
                </div>
                <a href="{{ route('users.create') }}" class="btn btn-primary d-flex align-items-center">
                    Ajouter un utilisateur
                </a>
            @endif
        </section>
    </main>

@endsection
