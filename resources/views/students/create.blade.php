@extends('base')
@section('title', 'Ajout d\'un étudiant')
@section('content')
    <div class="container mx-auto">
        <form class="card grid-col-2 grid text-gray-800" action="{{ route('students.store') }}" method="post">
            @csrf
            <div class="">
                <label for="">Nom</label>
                <input class="text-gray-800" type="text">
            </div>
            <div class="">
                <label for="">Prénom</label>
                <input class="text-gray-800" type="text">
            </div>
            <div class="">
                <label for="">Présence</label>
                <select class="text-gray-800" name="presence" id="presence">
                    <option value="Présent">Présent</option>
                    <option value="Non Présent">Non Présent</option>
                </select>
            </div>
            <button class="btn btn-primary">Ajouter</button>
            <button class="btn btn-outline">Annuler</button>
        </form>
    </div>
@endsection
