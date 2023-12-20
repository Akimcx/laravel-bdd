<div class="container dark:text-slate-200">
    <section class="mt-4">
        <a href="{{ route('instructors.create') }}">Ajouter un professeur</a>
    </section>
    <section class="mt-4">
        <x-table>
            <thead>
                <th><input type="checkbox"></th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Nbr de cours dispensés</th>
                <th>Nbr d'écoles affectées</th>
                <th>Nbr de sessions</th>
            </thead>
            <tbody>
                @foreach ($instructors as $instructor)
                    <tr class="cursor-pointer" wire:click="show({{ $instructor->id }})" wire:key="{{ $instructor->id }}">
                        <td><input x-on:click="$event.stopPropagation()" type="checkbox"></td>
                        <td>{{ $instructor->first_name }}</td>
                        <td>{{ $instructor->last_name }}</td>
                        <td>{{ $instructor->courses->count() }}</td>
                        <td>{{ $instructor->schools->count() }}</td>
                        <td>{{ $instructor->sessions->count() }}</td>
                        {{-- <td>{{ $instructor->courses->schools->count() }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    </section>
</div>
