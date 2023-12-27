<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <x-toolbar>
        @auth
            <a class="rounded p-1 dark:hover:bg-gray-700" href="{{ route('schools.create') }}">
                <x-icon.sign-plus></x-icon.sign-plus>
            </a>
        @endauth
        <x-icon.filter x-on:click="open = !open">
            <button class="hover:underline dark:text-rose-500">Reset</button>
            <x-filter.school></x-filter.school>
            <x-filter.instructor></x-filter.instructor>
        </x-icon.filter>
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
