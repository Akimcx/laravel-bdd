<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <section class="mt-4 grid grid-cols-2 gap-4">
        <form class="dark:bg-gray-900">
            <x-form.select label='Ajouter un professeur'></x-form.select>
            <button>Ajouter</button>
        </form>
        @if (!$as->isEmpty())
            <form class="dark:bg-gray-900">
                <x-form.select label='Ajouter un étudiant'>
                    @foreach ($as as $a)
                        <option value="{{ $a->id }}">{{ $a->first_name }} {{ strtoupper($a->last_name) }}</option>
                    @endforeach
                </x-form.select>
                <button>Ajouter</button>
            </form>
        @endif
        <form wire:submit='edit'>
            <button>Modifier</button>
        </form>
    </section>
    <div class="flex gap-2">
        <p>Title</p>
        <p>{{ $course->title }}</p>
    </div>
    <div class="flex gap-2">
        <details>
            <summary>Description</summary>
            {{ $course->description }}
        </details>
    </div>
    <div class="flex gap-2">
        <p>Faculté</p>
        @if ($course->schools()->get()->isEmpty())
            <p>Aucun</p>
        @else
            @foreach ($course->schools as $school)
                <p>{{ $school->sigle }}</p>
            @endforeach
        @endif
    </div>
    <div class="flex gap-2">
        <p>Professeur</p>
        @if ($course->instructors()->get()->isEmpty())
            <p>Aucun</p>
        @else
            @foreach ($course->instructors as $instructor)
                <p>{{ $instructor->first_name }} {{ strtoupper($instructor->last_name) }}</p>
            @endforeach
        @endif
    </div>
    <section class="mt-5">
        {{-- @if (!$all_students->isEmpty())
            <form wire:submit='attach' class="dark:bg-gray-900">
                <x-form.select wire:model.blur='student' label="Ajouter a ce cours">
                    @foreach ($all_students as $as)
                        <option value="{{ $as->id }}">{{ $as->first_name }} {{ $as->last_name }}</option>
                    @endforeach
                </x-form.select>
                <button>Ajouter</button>
            </form>
        @endif --}}
    </section>
    <section>
        <x-table>
            <thead>
                <th><input type="checkbox"></th>
                <th>Prénom</th>
                <th>Nom</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="cursor-pointer">
                        <td><input type="checkbox"></td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    </section>
</div>
