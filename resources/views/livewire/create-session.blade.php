<div class="container bg-inherit dark:text-slate-200">
    <form class="mt-4 grid gap-4 rounded border bg-inherit p-4" wire:submit='store'>
        <x-form.input type='date' wire:model='session_date' name='session_date' label='Date'></x-form.input>
        <div class="bg-inherit">
            <x-form.select wire:model.change.number='course_id' name='course' label='Cours'>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </x-form.select>
            <a href="{{ route('courses.create') }}">Ajouter un cours</a>
        </div>
        <div class="bg-inherit">
            <x-form.select name='school_id' wire:model.change.number='school_id' label='Écoles'>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->sigle }}</option>
                @endforeach
            </x-form.select>
            <a href="{{ route('courses.create') }}">Ajouter une école</a>
        </div>
        <x-form.select wire:model='instructor_id' label="Professeur">
            @foreach ($instructors as $instructor)
                <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
            @endforeach
        </x-form.select>
        <x-form.select multiple disabled label='Étudiants'>
            @foreach ($students as $student)
                <option selected value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </x-form.select>
        <button class="rounded border p-2">Ajouter</button>
    </form>
</div>
