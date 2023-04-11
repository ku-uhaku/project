@extends('layout.layout')

@section('title', 'Admin Dashboard - Manage Users')

@section('content')
<div class="row">
    @include('admin.menuDashboard')
    <div class="col-10">
       <div class="m-2 border p-2">
        <div class="container mh-100 ">
            <div class="row d-flex d-flex justify-content-between  align-items-center">
                <div class="col-5">
                    <h1 class="mt-3">Manage Users</h1>
                </div>
                <div class="col-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary p-2">ajouter un utilisateur </a>

                </div>
            </div>
            <div class="row">
                @if (count($users) == 0)
                    <div class="bg-danger">
                        <p>no users found</p>
                    </div>
                @else
                    <table class="table table-striped border  ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                {{-- <th>Age<!-- is not here right now but we gonna add it--></th> --}}
                                <th>Tele</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                {{-- <td>{{ $user->age }}</td> --}}
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->user_type }}</td>
                                <td class="d-flex justify-content-around align-items-center">
                                    <a href="{{ route('admin.users.show', $user->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                   <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                     {{-- 
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form> --}}
                                </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $users->links() }}
                    
                @endif
            </div>
        </div>
       

       </div>
    </div>
      
<div>

    
@endsection