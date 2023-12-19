<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    @auth
        <section class="mt-4 grid grid-cols-2 gap-4">
            @if (!$instructors->isEmpty())
                <form class="dark:bg-gray-900" wire:submit='atcInstructor'>
                    <x-form.select multiple wire:model='instructorProperty' label='Ajouter un professeur'>
                        @foreach ($instructors as $instructor)
                            <option value="{{ $instructor->id }}">{{ $instructor->name }}
                            </option>
                        @endforeach
                    </x-form.select>
                    <button>Ajouter</button>
                </form>
            @endif
            <form class="dark:bg-gray-900" wire:submit='atcSchool'>
                <x-form.select multiple wire:model='schoolProperty' label='Ajouter une école'>
                    @foreach ($schools as $scholl)
                        <option value="{{ $scholl->id }}">{{ $scholl->sigle }}</option>
                    @endforeach
                </x-form.select>
                <button>Ajouter</button>
            </form>
            @if (!$as->isEmpty())
                <form class="dark:bg-gray-900" wire:submit='atcStudent'>
                    <x-form.select wire:model='studentProperty' multiple label='Ajouter un étudiant'>
                        @foreach ($as as $a)
                            <option value="{{ $a->id }}">
                                {{ $a->name }}
                            </option>
                        @endforeach
                    </x-form.select>
                    <button>Ajouter</button>
                </form>
            @endif
            <form wire:submit='edit'>
                <button>Modifier</button>
            </form>
        </section>
    @endauth

    <div class="flex gap-2">
        <p>Titre</p>
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
        @if (!$course->instructors)
            <p>Aucun</p>
        @else
            @foreach ($course->instructors as $instructor)
                <p>{{ $instructor->name }}</p>
            @endforeach
        @endif
    </div>
    <section class="mt-4">
        <x-table>
            <x-table.thead>
                <th class="p-1">Prénom</th>
                <th>Nom</th>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($students as $student)
                    <x-table.tr class="cursor-pointer">
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </section>
    <section class="mt-4">
        {{ $students->links() }}
    </section>
</div>
