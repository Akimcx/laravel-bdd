<div class="container bg-inherit dark:text-slate-200">
    <x-flash></x-flash>
    <x-form class="mt-4 grid gap-4" wire:submit='store'>
        <x-form.input type='date' wire:model='session_date' name='session_date' label='Date'></x-form.input>
        <div class="bg-inherit">
            <x-form.select wire:model.change='course_id' name='course_id' label='Cours'>
                <option value="">Choisir</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </x-form.select>
            <a href="{{ route('courses.create') }}">Ajouter un cours</a>
        </div>
        <div class="bg-inherit">
            <x-form.select name='school_id' wire:model.change='school_id' label='Écoles'>
                <option value="">Choisir</option>
                @foreach ($schools as $school)
                    <option selected="{{ sizeof($schools) === 1 }}" value="{{ $school->id }}">
                        {{ $school->sigle }}
                    </option>
                @endforeach
            </x-form.select>
            <a href="{{ route('schools.create') }}">Ajouter une école</a>
        </div>
        <div class="bg-inherit">
            <x-form.select name="instructor_id" wire:model.change='instructor_id' label="Professeur">
                <option value="">Choisir</option>
                @foreach ($instructors as $instructor)
                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                @endforeach
            </x-form.select>
            <a href="{{ route('instructors.create') }}">Ajouter un professeur</a>
        </div>
        <x-form.select multiple disabled label='Étudiants'>
            @foreach ($students as $student)
                <option selected value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </x-form.select>
        <div>
            <x-primary-button>Ajouter</x-primary-button>
            <x-secondary-button wire:click="store(true)">Ajouter & Fermer</x-secondary-button>
            <x-secondary-button><a href="{{ route('sessions.home') }}">Fermer</a></x-secondary-button>
        </div>
    </x-form>
</div>
