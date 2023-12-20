<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <x-toolbar class="mt-4">
        @auth
            <a href="{{ route('schools.create') }}">Ajouter une école</a>
        @endauth
        <div class="relative rounded p-1 dark:hover:bg-gray-700" x-data="{ open: false }">
            <x-icon.filter x-on:click="open = !open"></x-icon.filter>
            <div class="absolute rounded border p-4 dark:bg-gray-950" x-cloak x-show="open"
                x-on:click.outside="open = false">
                <x-filter.school></x-filter.school>
                <x-filter.instructor></x-filter.instructor>
            </div>
        </div>
    </x-toolbar>
    <section class="mt-4">
        <x-table>
            <x-table.thead>
                <th class="p-1">Sigle</th>
                <th>Cours disponibles</th>
                <th>Professeurs</th>
                <th>Étudiants</th>
                <th>Sessions</th>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($schools as $school)
                    <x-table.tr class="cursor-pointer" :value="$school->id" wire:click='show({{ $school->id }})'
                        wire:key='{{ $school->id }}'>
                        <td class="p-1">{{ $school->sigle }}</td>
                        <td>{{ $school->courses->count() }}</td>
                        <td>{{ $school->instructors->count() }}</td>
                        <td>{{ $school->students->count() }}</td>
                        <td>{{ $school->sessions->count() }}</td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </section>
</div>
