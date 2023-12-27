<div class="container dark:text-slate-200">
    @php
        $add = $course->id === null;
    @endphp
    <h1 class="text-2xl font-bold">Ajout d'un nouveau cours</h1>
    <form class="mt-4 grid gap-4 rounded border p-4 dark:border-gray-700 dark:bg-gray-950"
        wire:submit={{ $add ? 'store' : 'edit' }}>
        <x-form.input class="w-full invalid:border-red-600 dark:bg-inherit" wire:model.blur='title' name='title'
            label="Titre"></x-form.input>
        <x-form.textarea class="w-full" wire:model.blur='description' label="Description"></x-form.textarea>
        <div class="grid grid-cols-2 gap-4 bg-inherit">
            <x-form.select class="w-full" multiple wire:model.blur='instructor' :disabled="$instructors->isEmpty()" label="Professeurs">
                @foreach ($instructors as $tor)
                    <option @selected($course->instructors->contains($tor)) value="{{ $tor->id }}">
                        {{ $tor->first_name }} {{ strtoupper($tor->last_name) }}
                    </option>
                @endforeach
            </x-form.select>
            <x-form.select class="w-full" multiple wire:model.blur='school' :disabled="$schools->isEmpty()" label="École">
                @foreach ($schools as $school)
                    <option @selected($course->schools->contains($school)) value="{{ $school->id }}">
                        {{ $school->sigle }}
                    </option>
                @endforeach
            </x-form.select>
            <a class="text-sm underline" href="{{ route('instructors.create') }}">Ajouter un professeur</a>
            <a class="text-sm underline" href="{{ route('schools.create') }}">Ajouter une école</a>
        </div>
        <div>
            <x-primary-button>{{ $add ? 'Ajouter' : 'Modifier' }}</x-primary-button>
            <x-secondary-button link
                href="{{ route('courses.home') }}">{{ $add ? 'Fermer' : 'Annuler' }}</x-secondary-button>
        </div>
    </form>
</div>
