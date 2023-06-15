@extends('layout.layout')

@section('title', 'Gérer les Paiements')

@section('content')
    <main class="d-flex justify-content-between flex-row">
        {{-- @include('dashboard.panel') --}}

        <div class="container">
            <div class="row">
                <h1 class="mb-4 h2 ">Gérer les bills</h1>
                <x-alerts></x-alerts>


                <div class="row">
                    <div class="d-flex justify-content-between  mb-4  align-items-center">
                        <h5>
                            <span>
                                Cree un bill:
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
                    <form action="{{ route('bills.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-outline">
                                    <select name="title" id="title" class="form-control">
                                        <option value="" disabled selected>----</option>
                                        <option value="electricité">L'electricité</option>
                                        <option value="eau">l'eau</option>
                                        <option value="louer">Louer</option>
                                        <option value="vehicle">Vehicle</option>
                                    </select>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <label for="title" class="form-label">Titre</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" class="form-control" name="amount" id="amount"
                                        value="{{ old('amount') }}">
                                    @error('amoun')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <label for="amount" class="form-label">Amount</label>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-out-line">
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <label for="description">description</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Ajouter</button>
                    </form>
                </div>




            </div>


        </div>


    </main>

@endsection
