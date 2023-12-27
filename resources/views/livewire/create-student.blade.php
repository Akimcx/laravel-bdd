<div class="container dark:text-slate-200">
    @php
        $edit = $this->student->id !== null;
    @endphp
    <h1 class="mt-4 text-3xl font-bold">{{ $edit ? 'Modifier' : "Ajout d'un étudiant" }}</h1>
    <x-form class="mt-4 grid gap-4" wire:submit="{{ $edit ? 'edit' : 'store' }}">
        <x-form.input class="w-full" wire:model.blur='first_name' name='first_name' label='Prénom'></x-form.input>
        <x-form.input class="w-full" wire:model.blur='last_name' name='last_name' label='Nom'></x-form.input>
        <x-form.select class="w-full" :disabled="$schools->isEmpty()" wire:model.change='school_id' name='school_id' label='Écoles'>
            @foreach ($schools as $school)
                <option value="{{ $school->id }}">{{ $school->sigle }}</option>
            @endforeach
        </x-form.select>
        <x-form.select class="w-full" multiple wire:model='courseModel' name='course' label='Cours'>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
            @endforeach
        </x-form.select>
        <div class="col-span-2">
            <x-primary-button class="">{{ $edit ? 'Modifier' : 'Ajouter' }}</x-primary-button>
            @if (!$edit)
                <x-secondary-button wire:click="store(true)">Ajouter & Fermer</x-secondary-button>
            @endif
            <x-secondary-button link
                href="{{ route('students.home') }}">{{ $edit ? 'Annuler' : 'Fermer' }}</x-secondary-button>
        </div>
    </x-form>
    <div class="col-span-2">
        <x-primary-button class="">Ajouter</x-primary-button>
        <x-secondary-button>Ajouter & Fermer</x-secondary-button>
        <x-secondary-button><a href="{{ route('students.home') }}">Fermer</a></x-secondary-button>
    </div>
    </form>
</div>
