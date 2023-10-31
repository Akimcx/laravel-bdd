@extends('base')
@section('title', 'Acceuil')
@section('content')
    <main>
        <div class="container mx-auto">
            <a href="{{ route('internships.index') }}" class="btn-prm">Stages</a>
            <a href="{{ route('internships.index') }}" class="btn-prm">Formations</a>
            <a href="{{ route('chairs.index') }}" class="btn-prm">Chaires</a>
            <a href="{{ route('internships.index') }}" class="btn-prm">Membres</a>
            <a href="{{ route('internships.index') }}" class="btn-prm">Banque de ressources</a>
        </div>
    </main>
@endsection
