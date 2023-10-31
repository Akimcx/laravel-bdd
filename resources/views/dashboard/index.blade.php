<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-10 grid w-[95%] grid-flow-col gap-4">
        <div class="card">
            <a href={{ route('dashboard.profs.index') }} class="block text-center text-xl font-semibold">Professeurs</a>
        </div>
        <div class="card">
            <a href="{{ route('dashboard.facs.index') }}" class="block text-center text-xl font-semibold">Facultés</a>
        </div>
        <div class="card">
            <a href="{{ route('chairs.index') }}" class="block text-center text-xl font-semibold">Chaires</a>
        </div>
    </div>
</x-app-layout>
