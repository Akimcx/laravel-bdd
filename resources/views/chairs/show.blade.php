@extends('base.base')
@section('title', 'Chaire')
@section('script')
    @vite('resources/js/chair/show.js')
@endsection
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
            <dialog id="filterDialog">

            </dialog>
            <section class="flex gap-4 rounded bg-gray-800 p-2">
                @include('chairs.shared.controls')
                <button class="rounded p-1 dark:hover:bg-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path
                            d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
                    </svg>
                </button>
                <button class="rounded p-1 dark:hover:bg-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                        <path
                            d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z" />
                    </svg></button>
            </section>
            <section class="mt-10 flex justify-between">
                @include('chairs.shared.pill', ['label' => 'Professeur'])
                @include('chairs.shared.pill', ['label' => 'Faculté'])
                @include('chairs.shared.pill', ['label' => 'Vacation'])
                @include('chairs.shared.pill', ['label' => 'Date'])
            </section>
            <section class="students mt-5">
                @include('dashboard.shared.flash')
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                        <thead class="text-xs uppercase dark:bg-gray-800 dark:text-slate-200">
                            <tr>
                                <th scope="col" class="py-3 pl-6">
                                    <input type="checkbox" name="selectAll" id="selectAll">
                                </th>
                                <th scope="col" class="cursor-pointer px-3 py-3">
                                    <div class="flex items-center gap-1">
                                        Prénom
                                        <div class="relative" x-data="{ open: false }">
                                            <svg class="rounded px-1 dark:hover:bg-gray-500" @click="open = !open"
                                                xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                                <path
                                                    d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                                            </svg>
                                            <div class="absolute left-0 w-48 origin-top-right rounded p-2 dark:bg-gray-700"
                                                x-show="open" @click.outside="open = false">
                                                <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                    action="{{ route('chairs.show', ['chair' => $chair]) }}">
                                                    <input type="text" name="order_asc" value="first_name" hidden>
                                                    <button class="w-full text-left">Trier A -> Z</button>
                                                </form>
                                                <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                    action="{{ route('chairs.show', ['chair' => $chair]) }}">
                                                    <input type="text" name="order_desc" value="first_name" hidden>
                                                    <button class="w-full text-left">Trier Z -> A</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                                <th scope="col" class="flex cursor-pointer px-3 py-3">
                                    <div class="flex items-center gap-1">
                                        Nom
                                        <div class="relative" x-data="{ open: false }">
                                            <svg class="rounded px-1 dark:hover:bg-gray-500" @click="open = !open"
                                                xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                                <path
                                                    d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                                            </svg>
                                            <div class="absolute right-0 w-48 origin-top-left rounded p-2 dark:bg-gray-700"
                                                x-show="open" @click.outside="open = false">
                                                <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                    action="{{ route('chairs.show', ['chair' => $chair]) }}">
                                                    <input type="text" name="order_asc" value="last_name" hidden>
                                                    <button class="w-full text-left">Trier A -> Z</button>
                                                </form>
                                                <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                    action="{{ route('chairs.show', ['chair' => $chair]) }}">
                                                    <input type="text" name="order_desc" value="last_name" hidden>
                                                    <button class="w-full text-left">Trier Z -> A</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                                <th scope="col" class="cursor-pointer gap-2 px-3 py-3">
                                    <div class="flex items-center gap-1">
                                        Présence
                                        <div class="relative" x-data="{ open: false }">
                                            <svg class="rounded dark:hover:bg-gray-500" @click="open = !open"
                                                xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                                <path
                                                    d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                                            </svg>
                                            <div class="absolute right-0 top-5 w-48 origin-top-left rounded border p-2 shadow-md dark:border-gray-600 dark:bg-gray-700"
                                                x-show="open" @click.outside="open = false">
                                                <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                    action="{{ route('chairs.show', ['chair' => $chair]) }}">
                                                    <input type="text" name="order_asc" value="presence" hidden>
                                                    <button class="w-full text-left">Trier A -> Z</button>
                                                </form>
                                                <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                    action="{{ route('chairs.show', ['chair' => $chair]) }}">
                                                    <input type="text" name="order_desc" value="presence" hidden>
                                                    <button class="w-full text-left">Trier Z -> A</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y dark:divide-gray-500">
                            @foreach ($students as $student)
                                <tr class="group dark:bg-gray-700 dark:text-slate-200 dark:even:bg-gray-600">
                                    <td @clicked scope="row" class="py-2 pl-6">
                                        <input class="invisible block checked:visible group-hover:visible" type="checkbox"
                                            name="student" id="{{ $student->id }}" value="{{ $student->id }}">
                                    </td>
                                    <td class="px-3 py-3">
                                        {{ $student->first_name }}
                                    </td>
                                    <td class="px-3 py-3">
                                        {{ $student->last_name }}
                                    </td>
                                    <td class="px-3 py-3">
                                        {{ $student->presence }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            {{ $chairs->links() }}
        </div>
    </main>
@endsection
