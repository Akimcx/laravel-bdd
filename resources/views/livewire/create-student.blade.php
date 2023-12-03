<div class="container dark:text-slate-200">
    <h1 class="text-3xl font-bold">Ajout d'un étudiant</h1>
    <form class="mt-4 grid grid-cols-2 gap-4 rounded border p-4 dark:bg-gray-950" wire:submit='store'>
        <x-form.input class="w-full" wire:model.blur='first_name' name='first_name' label='Prénom'></x-form.input>
        <x-form.input class="w-full" wire:model.blur='last_name' name='last_name' label='Nom'></x-form.input>
        <x-form.select class="w-full" :disabled="$courses->isEmpty()" wire:model.blur='course' name='course' label='Cours'>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
            @endforeach
        </x-form.select>
        <x-form.select class="w-full" :disabled="$schools->isEmpty()" wire:model='school_id' name='school_id' label='Écoles'>
            @foreach ($schools as $school)
                <option value="{{ $school->id }}">{{ $school->sigle }}</option>
            @endforeach
        </x-form.select>
        <button class="col-span-2 rounded border p-2 dark:bg-gray-800">Ajouter</button>
    </form>
</div>
