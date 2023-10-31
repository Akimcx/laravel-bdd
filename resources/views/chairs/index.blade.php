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
                        @include('chairs.shared.controls')
                        <section id="elements" class="elements">
                            <small class="caption">
                                Liste des chaires: {{ $chairs->count() }} enregistrements
                            </small>
                            <div class="">
                                <div class="grid grid-cols-4">
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
