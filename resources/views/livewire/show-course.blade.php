<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    @auth
        <section class="mt-4 grid grid-cols-2 gap-4">
            @if (!$instructors->isEmpty())
                <x-form class="grid gap-4" wire:submit='atcInstructor'>
                    <x-form.select multiple wire:model='instructorProperty' label='Ajouter un professeur'>
                        @foreach ($instructors as $instructor)
                            <option value="{{ $instructor->id }}">{{ $instructor->name }}
                            </option>
                        @endforeach
                    </x-form.select>
                    <div>
                        <x-primary-button>Ajouter</x-primary-button>
                    </div>
                </x-form>
            @endif
            <x-form class="grid gap-4" wire:submit='atcSchool'>
                <x-form.select multiple wire:model='schoolProperty' label='Ajouter une école'>
                    @foreach ($schools as $scholl)
                        <option value="{{ $scholl->id }}">{{ $scholl->sigle }}</option>
                    @endforeach
                </x-form.select>
                <div>
                    <x-primary-button>Ajouter</x-primary-button>
                </div>
            </x-form>
            @if (!$as->isEmpty())
                <x-form wire:submit='atcStudent'>
                    <x-form.select wire:model='studentProperty' multiple label='Ajouter un étudiant'>
                        @foreach ($as as $a)
                            <option value="{{ $a->id }}">
                                {{ $a->name }}
                            </option>
                        @endforeach
                    </x-form.select>
                    <x-primary-button>Ajouter</x-primary-button>
                </x-form>
            @endif
        </section>
        <x-secondary-button>
            <a href="{{ route('courses.create', ['course' => $course->id]) }}">Modifier</a>
        </x-secondary-button>
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
