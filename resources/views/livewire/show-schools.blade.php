<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <section class="mt-4">
        @auth
            <a href="{{ route('schools.create') }}">Ajouter une école</a>
        @endauth
    </section>
    <section class="mt-4">
        <x-table>
            <x-table.thead>
                <th>Sigle</th>
                <th>Cours disponibles</th>
                <th>Professeurs</th>
                <th>Étudiants</th>
                <th>Sessions</th>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($schools as $school)
                    <x-table.tr class="cursor-pointer" :value="$school->id" wire:click='show({{ $school->id }})'
                        wire:key='{{ $school->id }}'>
                        <td>{{ $school->sigle }}</td>
                        <td>{{ $school->courses->count() }}</td>
                        <td>{{ $school->instructors->count() }}</td>
                        <td>{{ $school->students->count() }}</td>
                        <td>{{ $school->sessions()->count() }}</td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </section>
</div>
