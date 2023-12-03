<div class="container dark:text-slate-200">
    <h1 class="text-2xl font-bold">Ajout d'un nouveau cours</h1>
    <form class="mt-4 grid gap-4 rounded border p-4 dark:border-gray-700 dark:bg-gray-950"
        wire:submit={{ $course->id === null ? 'store' : 'edit' }}>
        <x-form.input class="w-full invalid:border-red-600 dark:bg-inherit" wire:model.blur='title' name='title'
            label="Titre"></x-form.input>
        <x-form.textarea class="w-full" wire:model.blur='description' label="Description"></x-form.textarea>
        <div class="grid grid-cols-2 gap-4 bg-inherit">
            <x-form.select class="w-full" multiple wire:model.blur='instructor' :disabled="$instructors->isEmpty()" label="Professeurs">
                @foreach ($instructors as $instructor)
                    <option selected="{{ $course->instructors->contains($instructor) }}" value="{{ $instructor->id }}">
                        {{ $instructor->first_name }} {{ strtoupper($instructor->last_name) }}
                    </option>
                @endforeach
            </x-form.select>
            <x-form.select class="w-full" multiple wire:model.blur='school' :disabled="$schools->isEmpty()" label="École">
                @foreach ($schools as $school)
                    <option selected="{{ $course->schools->contains($school) }}" value="{{ $school->id }}">
                        {{ $school->sigle }}
                    </option>
                @endforeach
            </x-form.select>
            <a class="text-sm underline" href="{{ route('instructors.create') }}">Ajouter un professeur</a>
            <a class="text-sm underline" href="{{ route('schools.create') }}">Ajouter une école</a>
        </div>

        <button
            class="rounded border p-2 dark:bg-gray-900 dark:hover:bg-gray-800">{{ $course->id === null ? 'Ajouter' : 'Modifier' }}</button>
    </form>
</div>
