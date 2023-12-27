<div class="container dark:text-slate-200">
    <h1 class="text-2xl font-bold">Ajout d'une nouvelle école</h1>
    <form class="mt-4 grid gap-4 rounded border p-4 dark:border-gray-700 dark:bg-gray-950" wire:submit='store'>
        <x-form.input @class([
            'w-full dark:bg-inherit',
            'border-red-600' => $errors->has('sigle'),
            'focus-visible:outline-red-600' => $errors->has('sigle'),
        ]) label="Sigle" required wire:model.blur="sigle"></x-form.input>
        <x-form.input class="w-full dark:bg-inherit" label="Nom" required wire:model.blur='name'
            name="name"></x-form.input>
        <fieldset class="grid grid-cols-2 gap-4 rounded border bg-inherit p-3">
            <legend class="px-2">Information de contact</legend>
            <x-form.input class="w-full" type="phone" wire:model.blur='phone' label="Téléphone"
                name="phone"></x-form.input>
            <x-form.input class="w-full" type="" wire:model.blur='email' label="Email"></x-form.input>
            <x-form.input class="w-full" wire:model.blur='address' label="Addresse"></x-form.input>
            <x-form.input class="w-full" wire:model.blur='url' type="url" label="URL"></x-form.input>
        </fieldset>
        <div class="grid grid-cols-2 gap-4 bg-inherit">
            <x-form.select class="w-full" :disabled="$courses->isEmpty()" label="Cours">
                <option value="">Choisir</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </x-form.select>
            <x-form.select class="w-full" :disabled="$instructors->isEmpty()" label="Professeur">
                <option value="">Choisir</option>
                @foreach ($instructors as $instructor)
                    <option value="{{ $instructor->id }}">{{ $instructor->first_name }} {{ $instructor->last_name }}
                    </option>
                @endforeach
            </x-form.select>
            <a class="text-sm underline" href="{{ route('courses.create') }}">Ajouter un cours</a>
            <a class="text-sm underline" href="{{ route('instructors.create') }}">Ajouter un professeur</a>
        </div>
        <div>
            <x-primary-button>Ajouter</x-primary-button>
            <x-secondary-button wire:click="store(true)">Ajouter & Fermer</x-secondary-button>
            <x-secondary-button class="cursor-pointer" href="{{ route('schools.home') }}"
                link>Fermer</x-secondary-button>
        </div>
    </form>
</div>
