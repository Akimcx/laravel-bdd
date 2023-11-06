@extends('base')
@section('title', 'Chaire')
@section('content')
    <main class="fill-white text-white">
        <div class="container mx-auto w-[95%]">
            <dialog id="addDialog">
                <form class="card grid gap-4" action="{{ route('students.store', ['chair' => $chair]) }}" method="post">
                    @csrf
                    <div class="flex flex-col">
                        <label for="first_name">Nom</label>
                        <input class="rounded p-2 outline outline-2 dark:bg-transparent dark:text-slate-100" type="text"
                            id="first_name" name="first_name" value="{{ old('first_name') }}">
                    </div>
                    @error('first_name')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="flex flex-col">
                        <label for="">Prénom</label>
                        <input class="rounded p-2 outline outline-2 dark:bg-transparent dark:text-slate-100" type="text"
                            name="last_name" value="{{ old('last_name') }}">
                    </div>
                    @error('last_name')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="flex flex-col">
                        <label for="">Présence</label>
                        <select class="rounded p-2 outline outline-2 dark:bg-gray-800 dark:text-slate-100" name="presence"
                            id="presence">
                            <option value="">Choisir</option>
                            <option value="Présent">Présent</option>
                            <option value="Non Présent">Non Présent</option>
                        </select>
                    </div>
                    @error('presence')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="">
                        <button class="btn btn-primary">Ajouter</button>
                        <button class="btn btn-outline" formmethod="dialog">Annuler</button>
                    </div>
                </form>
            </dialog>
            <section class="flex gap-4 rounded bg-gray-800 p-2">
                @include('chairs.shared.controls')
                <button class="btn btn-primary">Filtrer</button>
            </section>
            <section class="mt-10 flex justify-between">
                @include('chairs.shared.pill', ['label' => 'Professeur'])
                @include('chairs.shared.pill', ['label' => 'Faculté'])
                @include('chairs.shared.pill', ['label' => 'Vacation'])
                @include('chairs.shared.pill', ['label' => 'Date'])
            </section>
            <section class="students mt-5">
                @include('dashboard.shared.flash')
                <small>
                    Liste des participants: {{ $students->count() }}
                    enregistrements</small>
                <div>
                    <div class="grid grid-cols-3 rounded bg-gray-800 p-1 text-center">
                        @foreach (['Prénom', 'Nom', 'Présence'] as $label)
                            <div class="flex cursor-pointer items-center gap-1">
                                @include('chairs.shared.desc')
                                <p>{{ $label }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="">
                        @foreach ($students as $student)
                            <div class="grid grid-cols-3 even:rounded even:bg-gray-700">
                                {{-- <input type="checkbox" name="students" value="<%= students[0].id %>" /> --}}
                                <p class="p-2">{{ $student->first_name }}</p>
                                <p class="p-2">{{ $student->last_name }}</p>
                                <p class="p-2">{{ $student->presence }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script>
        const addBtn = document.getElementById("add")
        addBtn.addEventListener("click", e => {
            const dialog = document.getElementById("addDialog")
            dialog.showModal()
        })
    </script>
@endsection
