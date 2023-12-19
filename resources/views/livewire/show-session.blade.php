<div class="container dark:text-slate-200">
    <section class="mt-4 dark:fill-slate-200">
        @auth
            <x-icon.delete wire:click="delete"></x-icon.delete>
        @endauth
    </section>
    <section class="mt-4">
        <details>
            <summary class="cursor-pointer">Information sur le cours</summary>
            <x-form wire:submit="update">
                <x-form.input disabled type='date' label='Date' :value="$session->session_date->format('Y-m-d')"></x-form.input>
                <x-form.input disabled label='Cours' :value="$session->course->title"></x-form.input>
                <x-form.input disabled label='Professeurs' :value="$session->instructor->name"></x-form.input>
                <x-form.input disabled label='École' :value="$session->school->sigle"></x-form.input>
                {{-- <x-primary-button class="col-span-2 justify-center" x-show="$wire.canEdit">Modifier</x-primary-button> --}}
            </x-form>
        </details>
        @auth
            <details>
                <summary>Ajouter un étudiant</summary>
                <x-form wire:submit="addStudent">
                    <x-form.input name="first_name" wire:model.blur="first_name" label="Prenom"></x-form.input>
                    <x-form.input name="last_name" wire:model.blur="last_name" label="Nom"></x-form.input>
                    <div>
                        <x-primary-button>Ajouter</x-primary-button>
                    </div>
                </x-form>
            </details>
        @endauth
    </section>
    <section class="mt-4">
        <x-table>
            <caption x-on:click="$dispatch('student-created', { id: '1' })">Liste des étudiants</caption>
            <x-table.thead>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Present</th>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($session->students as $student)
                    <x-table.tr @class(['italic text-gray-500' => !$student->pivot->is_present]) :value="$student->id" wire:key="{{ $student->id }}">
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>
                            <label class="relative m-1 inline-flex cursor-pointer items-center">
                                <input class="peer sr-only" value="{{ $student->id }}"
                                    wire:model.live.number='presentBoxes'
                                    wire:click='toggleStudentPresence({{ $student->id }})' type="checkbox"
                                    @checked($student->pivot->is_present)>
                                <div
                                    class="peer h-6 w-11 rounded-full after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:transition-all after:content-[''] peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full dark:border-gray-900 dark:bg-gray-700 dark:after:border-gray-300 dark:after:bg-white dark:peer-checked:bg-emerald-600 dark:peer-checked:after:border-white dark:peer-focus:border-none">
                                </div>
                                {{-- <span
                                    class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ in_array($student->id, $presentBoxes) ? 'Present' : 'Non present' }}</span> --}}
                            </label>
                        </td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </section>
</div>
