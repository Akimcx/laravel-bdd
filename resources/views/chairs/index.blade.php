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
                                        <th scope="col" class="py-3 pl-6">
                                            <input type="checkbox" name="selectAll" id="selectAll">
                                        </th>
                                        <th scope="col" class="cursor-pointer px-3 py-3">
                                            <div class="flex items-center gap-1">
                                                Dates
                                                <div class="relative" x-data="{ open: false }">
                                                    <x-dropdown align="left">
                                                        <x-slot name="trigger">
                                                            <x-carret-down></x-carret-down>
                                                        </x-slot>
                                                        <x-slot name="content">
                                                            <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                                action="{{ route('chairs.index') }}">
                                                                <input type="text" name="order_asc" value="first_name"
                                                                    hidden>
                                                                <button class="w-full text-left">Trier A -> Z</button>
                                                            </form>
                                                            <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                                action="{{ route('chairs.index') }}">
                                                                <input type="text" name="order_desc" value="first_name"
                                                                    hidden>
                                                                <button class="w-full text-left">Trier Z -> A</button>
                                                            </form>
                                                        </x-slot>

                                                    </x-dropdown>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col" class="flex cursor-pointer px-3 py-3">
                                            <div class="flex items-center gap-1">
                                                Professeur
                                                <div class="relative" x-data="{ open: false }">
                                                    <x-carret-down @click="open = !open"></x-carret-down>
                                                    <div class="absolute right-0 w-48 origin-top-left rounded p-2 dark:bg-gray-700"
                                                        x-show="open" @click.outside="open = false">
                                                        <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                            action="{{ route('chairs.index') }}">
                                                            <input type="text" name="order_asc" value="last_name" hidden>
                                                            <button class="w-full text-left">Trier A -> Z</button>
                                                        </form>
                                                        <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                            action="{{ route('chairs.index') }}">
                                                            <input type="text" name="order_desc" value="last_name"
                                                                hidden>
                                                            <button class="w-full text-left">Trier Z -> A</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col" class="cursor-pointer gap-2 px-3 py-3">
                                            <div class="flex items-center gap-1">
                                                Faculté
                                                <div class="relative" x-data="{ open: false }">
                                                    <x-carret-down @click="open = !open"></x-carret-down>
                                                    <div class="absolute right-0 top-5 w-48 origin-top-left rounded border p-2 shadow-md dark:border-gray-600 dark:bg-gray-700"
                                                        x-show="open" @click.outside="open = false">
                                                        <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                            action="{{ route('chairs.index') }}">
                                                            <input type="text" name="order_asc" value="presence" hidden>
                                                            <button class="w-full text-left">Trier A -> Z</button>
                                                        </form>
                                                        <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                            action="{{ route('chairs.index') }}">
                                                            <input type="text" name="order_desc" value="presence" hidden>
                                                            <button class="w-full text-left">Trier Z -> A</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col" class="cursor-pointer gap-2 px-3 py-3">
                                            <div class="flex items-center gap-1">
                                                Vacation
                                                <div class="relative" x-data="{ open: false }">
                                                    <x-carret-down @click="open = !open"></x-carret-down>
                                                    <div class="absolute right-0 top-5 w-48 origin-top-left rounded border p-2 shadow-md dark:border-gray-600 dark:bg-gray-700"
                                                        x-show="open" @click.outside="open = false">
                                                        <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                            action="{{ route('chairs.index') }}">
                                                            <input type="text" name="order_asc" value="presence"
                                                                hidden>
                                                            <button class="w-full text-left">Trier A -> Z</button>
                                                        </form>
                                                        <form class="rounded p-2 dark:hover:bg-gray-800" method="GET"
                                                            action="{{ route('chairs.index') }}">
                                                            <input type="text" name="order_desc" value="presence"
                                                                hidden>
                                                            <button class="w-full text-left">Trier Z -> A</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y dark:divide-gray-500">
                                    @foreach ($chairs as $chair)
                                        <a x-on:link="console.log($el)"
                                            href="{{ route('chairs.show', ['chair' => $chair->id]) }}"></a>
                                        <tr class="group dark:bg-gray-700 dark:text-slate-200 dark:even:bg-gray-600">
                                            <td scope="row" class="py-2 pl-6">
                                                <input class="invisible block checked:visible group-hover:visible"
                                                    type="checkbox" name="chaire" id="{{ $chair->id }}"
                                                    value="{{ $chair->id }}">
                                            </td>
                                            <td class="px-3 py-3">
                                                {{ $chair->dates }}
                                            </td>
                                            <td class="px-3 py-3">
                                                {{ $chair->first_name . ' ' . strtoupper($chair->last_name) }}
                                            </td>
                                            <td x-on:click="$dispatch('link')" class="px-3 py-3">
                                                {{ $chair->sigle }}
                                            </td>
                                            <td class="px-3 py-3">
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
    </main>
@endsection
