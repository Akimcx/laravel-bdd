<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <section>
        <a href="{{ route('schools.create') }}">Ajouter une école</a>
    </section>
    <section>
        <x-table>
            <thead>
                <th><input type="checkbox"></th>
                <th>Sigle</th>
                <th>Nom</th>
                <th>Cours disponible</th>
            </thead>
            <tbody>
                @foreach ($schools as $school)
                    <tr class="cursor-pointer" wire:click='show({{ $school->id }})' wire:key='{{ $school->id }}'>
                        <td><input type="checkbox"></td>
                        <td>{{ $school->sigle }}</td>
                        <td>{{ Str::words($school->name, 6) }}</td>
                        <td>{{ $school->courses->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    </section>
</div>
