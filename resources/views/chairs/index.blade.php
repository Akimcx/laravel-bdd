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
                    <div class="flex gap-4 rounded bg-gray-800 p-1">
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
                                                {{ $chair->dates }}
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
        {{ $chairs->links() }}
    </main>
@endsection
