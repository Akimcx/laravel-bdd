<div class="container dark:text-slate-200">
    <x-toolbar class="mt-4">
        <a class="rounded p-1 dark:hover:bg-gray-700" href="{{ route('instructors.create') }}">
            <x-icon.add-user></x-icon.add-user>
        </a>
        <x-icon.filter>
            <x-filter.school></x-filter.school>
            <x-filter.instructor></x-filter.instructor>
        </x-icon.filter>
    </x-toolbar>
    <section class="mt-4">
        <x-table>
            <x-table.thead>
                <x-table.th class="p-1">Prénom</x-table.th>
                <x-table.th>Nom</x-table.th>
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
