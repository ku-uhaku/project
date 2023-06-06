@extends('layout.layout')

@section('title', '404 Error')


@section('content')
    <div id='oopss'>
        <div id='error-text'>
            <img src="https://cdn.rawgit.com/ahmedhosna95/upload/1731955f/sad404.svg" alt="404">
            <span>404 PAGE</span>
            <p class="p-a">
                . La page que vous recherchez est introuvable</p>
            <p class="p-b">
                ... retour à la page précédente
            </p>
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="back">... retour à la page précédente</a>
        </div>
    </div>
@endsection
