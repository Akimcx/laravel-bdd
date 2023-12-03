<div class="container dark:text-slate-200">
    <h1 class="text-2xl font-bold">Ajout d'un nouveau professeur</h1>
    <form class="mt-4 grid gap-4 rounded border p-4 dark:border-gray-700 dark:bg-gray-950" wire:submit='store'>
        <fieldset class="grid grid-cols-2 gap-4 rounded border bg-inherit p-3">
            <legend class="px-2">Information Personnelle</legend>
            <x-form.input class="w-full" name="first_name" wire:model.blur='first_name' label="Prénom"></x-form.input>
            <x-form.input class="w-full dark:bg-inherit" name="last_name" wire:model.blur='last_name'
                label="Nom"></x-form.input>
        </fieldset>
        <fieldset class="grid grid-cols-2 gap-4 rounded border bg-inherit p-3">
            <legend class="px-2">Information de contact</legend>
            <x-form.input class="w-full" type="phone" name="phone" wire:model.blur='phone'
                label="Téléphone"></x-form.input>
            <x-form.input class="w-full" type="email" wire:model.blur='email' label="Email"></x-form.input>
        </fieldset>
        <fieldset class="grid grid-cols-2 gap-4 rounded border bg-inherit p-3">
            <legend class="px-2">Cours et écoles</legend>
            <x-form.select class="w-full" wire:model.blur='course' :disabled="$courses->isEmpty()" label="Cours">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </x-form.select>
            <x-form.select class="w-full" :disabled="$schools->isEmpty()" label="École">
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->sigle }}</option>
                @endforeach
            </x-form.select>
            <a class="text-sm underline" href="{{ route('courses.create') }}">Ajouter un cours</a>
            <a class="text-sm underline" href="{{ route('schools.create') }}">Ajouter une école</a>
        </fieldset>
        <button class="rounded border p-2 dark:bg-gray-900 dark:hover:bg-gray-800">Ajouter</button>
    </form>
</div>
