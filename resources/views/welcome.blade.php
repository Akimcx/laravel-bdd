@extends('base.base')
@section('title', 'Acceuil')
@section('content')
    <main>
        <div class="container card mx-auto grid grid-cols-2 gap-4 text-center">
            <a class="btn btn-primary" href="{{ route('internships.index') }}">Stages</a>
            <a class="btn btn-primary" href="{{ route('internships.index') }}">Formations</a>
            <a class="btn btn-primary" href="{{ route('chairs.index') }}">Chaires</a>
            <a class="btn btn-primary" href="{{ route('internships.index') }}">Membres</a>
            <a class="btn btn-primary" href="{{ route('internships.index') }}">Banque de ressources</a>
        </div>
    </main>
@endsection
