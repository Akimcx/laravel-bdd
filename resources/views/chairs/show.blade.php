@extends('base')
@section('title', 'Chaire')
@section('content')
    <main class="fill-white text-white">
        <div class="container mx-auto w-[95%]">
            <dialog id="addDialog">
                <form class="card grid-col-2 grid text-gray-800" action="{{ route('students.store', ['chair' => $chair]) }}"
                    method="post">
                    @csrf
                    <div class="">
                        <label for="">Nom</label>
                        <input class="text-gray-800" type="text" name="first_name" value="{{ old('first_name') }}">
                    </div>
                    @error('first_name')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="">
                        <label for="">Prénom</label>
                        <input class="text-gray-800" type="text" name="last_name" value="{{ old('last_name') }}">
                    </div>
                    @error('last_name')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="">
                        <label for="">Présence</label>
                        <select class="text-gray-800" name="presence" id="presence">
                            <option value="Présent">Présent</option>
                            <option value="Non Présent">Non Présent</option>
                        </select>
                    </div>
                    @error('presence')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="">
                        <button class="btn btn-primary">Ajouter</button>
                        <button class="btn btn-outline">Annuler</button>
                    </div>
                </form>
            </dialog>
            <section class="flex gap-4 rounded bg-gray-800 p-2">
                @include('chairs.shared.controls')
                <div class="relative rounded dark:text-gray-800">
                    <input class="rounded pr-10 focus:border-gray-500" type="text" name="filter" id="filter" />
                    <button class="absolute bottom-0 right-0 top-0 bg-gray-500 fill-white px-2">
                        @include('chairs.shared.search')
                    </button>
                </div>
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
                        <p class="tcell">
                            Prénom
                        </p>
                        <p class="tcell">Nom</p>
                        <p class="tcell">Présence</p>
                    </div>
                    <div class="">
                        @foreach ($students as $student)
                            <div class="grid grid-cols-3 text-center even:rounded even:bg-gray-700">
                                {{-- <input type="checkbox" name="students" value="<%= students[0].id %>" /> --}}
                                <p class="p-2">{{ $student->first_name }}</p>
                                <p class="p-2">{{ $student->last_name }}</p>
                                <p class="p-2">{{ $student->presence }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- <section>
                hey
                @dump($chairs->links())
                {{ $chairs->currentPage() }}
            </section> --}}
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
