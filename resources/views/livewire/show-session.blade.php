<div class="container dark:text-slate-200">
    <x-toolbar>
        @auth
            <a class="rounded p-1 dark:hover:bg-gray-700" href="{{ route('sessions.create') }}">
                <x-icon.sign-plus></x-icon.sign-plus>
            </a>
            <button @class([
                'rounded p-1 dark:hover:bg-gray-700',
                'hidden' => sizeof($boxes) === 0,
            ])>
                <x-icon.delete wire:click="delete"></x-icon.delete>
            </button>
            <div class="relative rounded p-1 dark:hover:bg-gray-700" x-data="{ open: false }">
                <x-icon.filter x-on:click="open = !open"></x-icon.filter>
                <div class="absolute rounded border p-4 dark:bg-gray-950" x-cloak x-show="open"
                    x-on:click.outside="open = false">
                    <fieldset class="rounded border p-2">
                        <legend class="px-2">Presence</legend>
                        <x-form class="flex gap-2 border-none !p-0">
                            @foreach ([0, 1] as $key)
                                <div class="flex items-center gap-1">
                                    <input wire:model.live="presentProperty" id="{{ $key }}"
                                        value="{{ $key }}" name="presentProperty" type="radio" />
                                    <label for="{{ $key }}">{{ $key === 1 ? 'Présent' : 'Absent' }}
                                    </label>
                                </div>
                            @endforeach
                            <x-icon.x-mark class="rounded p-1 dark:hover:bg-rose-900"
                                wire:click="rset('presentProperty')"></x-icon.x-mark>
                        </x-form>
                    </fieldset>
                </div>
            </div>
        @endauth
    </x-toolbar>
    <section class="mt-4">
        <details>
            <summary class="cursor-pointer">Information sur le cours</summary>
            <x-form class="grid grid-cols-2 gap-4" wire:submit="update">
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
                <x-form class="grid grid-cols-2 gap-4" wire:submit="addStudent">
                    <x-form.input autofocus name="first_name" wire:model="first_name" label="Prenom"></x-form.input>
                    <x-form.input name="last_name" wire:model="last_name" label="Nom"></x-form.input>
                    <div>
                        <x-primary-button>Ajouter</x-primary-button>
                    </div>
                </x-form>
            </details>
        @endauth
    </section>
    <section class="mt-4">
        <x-table>
            <x-table.thead>
                <x-table.th class="p-1">Nom</x-table.th>
                <x-table.th>Prénom</x-table.th>
                <th>Présent</th>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($students as $student)
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
                        </td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </section>
    <section class="mt-4 flex gap-4 dark:fill-slate-200" x-cloak x-show="false">
        <x-secondary-button>
            <x-icon.caret-left></x-icon.caret-left>
        </x-secondary-button>
        <x-secondary-button>
            <x-icon.caret-right></x-icon.caret-right>
        </x-secondary-button>
    </section>
</div>
