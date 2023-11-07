@extends('base.base')
@section('title', 'Chaire')
@section('content')
    <main>
        <div class="container mx-auto flex w-[95%] flex-col items-center justify-center">
            @if ($profs->isEmpty() || $facs->isEmpty())
                @php
                    $title = $profs->isEmpty() ? 'professeurs' : 'facultés';
                    $route = $profs->isEmpty() ? route('dashboard.profs.create') : route('dashboard.facs.create');
                @endphp
                <div class="card">
                    <h1 class="mb-2 text-xl text-slate-100">La liste des {{ $title }} est vide</h1>
                    <a class="btn btn-primary" href="{{ $route }}">Ajouter</a>
                </div>
            @else
                <div class="mb-5 flex w-full gap-1 rounded p-3 dark:bg-gray-800">
                    <a class="rounded p-1.5 dark:bg-gray-700 dark:text-slate-100 dark:hover:bg-gray-600"
                        href="{{ route('dashboard.profs.create') }}">Ajouter un professeur
                    </a>
                    <a class="rounded p-1.5 dark:bg-gray-700 dark:text-slate-100 dark:hover:bg-gray-600"
                        href="{{ route('dashboard.facs.create') }}">Ajouter une faculté
                    </a>
                </div>
                @foreach ($errors->all() as $message)
                    <p>{{ $message }}</p>
                @endforeach
                <form action="{{ route('chairs.store') }}" method="post" class="card grid w-full grid-cols-2 gap-4">
                    @csrf
                    <div class="">
                        <label class="mb-2" for="prof">Professeur</label>
                        <select
                            class="w-full rounded p-2 outline outline-2 dark:bg-gray-800 dark:text-slate-100 dark:outline-slate-300"
                            name="prof_id" id="prof" required>
                            <option value="">Choisir</option>
                            @foreach ($profs as $prof)
                                <option value="{{ $prof->id }}">{{ $prof->name }}</option>
                            @endforeach
                        </select>
                        @error('prof_id')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative text-slate-100">
                        <label class="" for="fac">Faculté</label>
                        <select class="w-full rounded bg-gray-800 p-2 text-slate-100 outline outline-2 outline-slate-300"
                            name="fac_id" id="fac" required>
                            <option value="">Choisir</option>
                            @foreach ($facs as $fac)
                                <option value="{{ $fac->id }}">{{ $fac->sigle }}</option>
                            @endforeach
                        </select>
                        @error('fac_id')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative text-slate-100">
                        <label for="vacation">Vacation</label>
                        <select class="w-full rounded bg-gray-800 p-2 text-slate-100 outline outline-2 outline-slate-300"
                            name="vacation" id="vacation" required>
                            <option value="">Choisir</option>
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                        @error('vacation')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative text-slate-100">
                        <label for="date">Date</label>
                        <input class="w-full rounded bg-gray-800 p-2 text-slate-100 outline outline-2 outline-slate-300"
                            type="date" name="dates" id="date" required />
                        @error('dates')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2 flex items-center gap-4">
                        <button class="btn btn-primary flex-grow" id="confirm_new_sheet" type="submit">
                            Ajouter
                        </button>
                        <a class="btn btn-outline flex-grow text-center" href="{{ route('chairs.index') }}"
                            id="cancel_new_sheet">
                            Annuler
                        </a>
                    </div>
                </form>
        </div>
        @endif
    </main>
@endsection
