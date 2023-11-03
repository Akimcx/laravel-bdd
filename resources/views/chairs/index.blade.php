@extends('base')
@section('title', 'Chaires')
@section('content')
    <main class="text-white">
        <div class="container mx-auto mt-10 w-[95%]">
            @if ($chairs->isEmpty())
                <div class="flex items-center justify-center">
                    <div class="card flex max-w-md flex-col items-center gap-4">
                        <p class="text-center text-xl font-semibold">Aucune donnée n'est actuellement disponible.</p>
                        <a href="{{ route('chairs.create') }}" class="btn btn-primary">Ajouter</a>
                    </div>
                </div>
            @else
                <section id="content" class="">
                    <div class="wrapper">
                        <div class="flex gap-4 rounded bg-gray-800 p-1">
                            <a class="btn btn-primary" href="{{ route('chairs.create') }}">Ajouter</a>
                            @auth
                                <form action="{{ route('chairs.create') }}" method="post">
                                    <button class="btn btn-primary">Supprimer</button>
                                </form>
                            @endauth
                            <div class="relative rounded dark:text-gray-800">
                                <input class="rounded pr-10 focus:border-gray-500" type="text" name="filter"
                                    id="filter" />
                                <button class="absolute bottom-0 right-0 top-0 bg-gray-500 fill-white px-2">
                                    @include('chairs.shared.search')
                                </button>
                            </div>
                        </div>
                        {{-- @include('chairs.shared.controls') --}}
                        <section id="elements" class="elements">
                            <small class="caption">
                                Liste des chaires: {{ $chairs->count() }} enregistrements
                            </small>
                            <div class="rounded text-center">
                                <div class="grid grid-cols-4 justify-center rounded bg-gray-800 p-1 text-center">
                                    <p class="">Date</p>
                                    <p class="">Faculté</p>
                                    <p class="">Professeur</p>
                                    <p class="">Vacation</p>
                                </div>
                                <div class="flex gap-4">
                                    @foreach ($chairs as $chair)
                                        <a class="grid w-full grid-cols-4"
                                            href="{{ route('chairs.show', ['chair' => $chair]) }}">
                                            <p class="tcell">{{ $chair->dates }}</p>
                                            <p class="tcell">{{ $chair->fac->sigle }}</p>
                                            <p class="tcell">M {{ $chair->prof->last_name }}</p>
                                            <p class="tcell">{{ $chair->vacation }}</p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            @endif
        </div>
    </main>
@endsection
