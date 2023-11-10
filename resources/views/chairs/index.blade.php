@extends('base.base')
@section('title', 'Chaires')
@section('script')
    @vite('resources/js/chair/index.js')
@endsection
@section('content')
    <main class="text-white">
        <div class="container mx-auto mt-5 w-[95%]">
            @if ($chairs->isEmpty())
                <div class="flex items-center justify-center">
                    <div class="card flex max-w-md flex-col items-center gap-4">
                        <p class="text-center text-xl font-semibold">Aucune donnée n'est actuellement disponible.</p>
                        <a href="{{ route('chairs.create') }}" class="btn btn-primary">Ajouter</a>
                    </div>
                </div>
            @else
                <section id="content" class="">
                    <div class="flex items-center gap-4 rounded bg-gray-800 p-2">
                        <div>
                            <label for="searchItem" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="searchItem"
                                    class="block w-80 rounded-lg p-2 pl-10 text-sm dark:bg-gray-700 dark:outline dark:outline-2 dark:outline-gray-500 dark:focus:outline-gray-300"
                                    placeholder="Search for items">
                            </div>
                        </div>
                        @auth
                            <a class="rounded p-1 dark:fill-slate-100 dark:hover:bg-gray-500"
                                href="{{ route('chairs.create') }}">
                                @include('chairs.shared.add')
                            </a>
                            <form action="{{ route('chairs.create') }}" method="post">
                                <button class="dark:fill-slate-100">@include('chairs.shared.delete')</button>
                            </form>
                        @endauth
                    </div>
                    <section class="mt-5">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                                <thead class="text-xs uppercase dark:bg-gray-800 dark:text-slate-200">
                                    <tr>
                                        <th class="pl-6"><input type="checkbox" id="selectAll"></th>
                                        <x-table.thead sortBy="dates" align="left" title="dates"></x-table.thead>
                                        <x-table.thead sortBy="profs" title="professeur"></x-table.thead>
                                        <x-table.thead sortBy="facs" title="faculté"></x-table.thead>
                                        <x-table.thead sortBy="vacation" title="vacation"></x-table.thead>
                                    </tr>
                                </thead>
                                <tbody class="divide-y dark:divide-gray-500">
                                    @foreach ($chairs as $chair)
                                        <a x-on:{{ $chair->id }}.window="$el.click()" x-data
                                            href="{{ route('chairs.show', ['chair' => $chair->id]) }}"></a>
                                        <tr
                                            class="group cursor-pointer dark:bg-gray-700 dark:text-slate-200 dark:even:bg-gray-600">
                                            <td scope="row" class="py-2 pl-6">
                                                <input class="invisible block checked:visible group-hover:visible"
                                                    type="checkbox" name="chaire" id="{{ $chair->id }}"
                                                    value="{{ $chair->id }}">
                                            </td>
                                            <td x-data @click="$dispatch('{{ $chair->id }}')" class="px-3 py-3">
                                                {{ $chair->dates->locale('fr_FR')->toFormattedDateString() }}
                                            </td>
                                            <td x-data @click="$dispatch('{{ $chair->id }}')" class="px-3 py-3">
                                                {{ $chair->prof->name }}
                                            </td>
                                            <td x-data @click="$dispatch('{{ $chair->id }}')" class="px-3 py-3">
                                                {{ $chair->fac->sigle }}
                                            </td>
                                            <td x-data @click="$dispatch('{{ $chair->id }}')" class="px-3 py-3">
                                                {{ $chair->vacation }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </section>
            @endif
        </div>
        {{ $chairs->withQueryString()->links() }}
    </main>
@endsection
