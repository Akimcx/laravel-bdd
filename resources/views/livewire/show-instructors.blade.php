<div class="container dark:text-slate-200">
    <section class="mt-4">
        <a href="{{ route('instructors.create') }}">Ajouter un professeur</a>
    </section>
    <section class="mt-4">
        <x-table>
            <x-table.thead>
                <th class="p-1">Prénom</th>
                <th>Nom</th>
                <th>Nbr de cours dispensés</th>
                <th>Nbr d'écoles affectées</th>
                <th>Nbr de sessions</th>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($instructors as $instructor)
                    <x-table.tr class="cursor-pointer" wire:click="show({{ $instructor->id }})"
                        wire:key="{{ $instructor->id }}">
                        <td class="p-1">{{ $instructor->first_name }}</td>
                        <td>{{ $instructor->last_name }}</td>
                        <td>{{ $instructor->courses->count() }}</td>
                        <td>{{ $instructor->schools->count() }}</td>
                        <td>{{ $instructor->sessions->count() }}</td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </section>
</div>
