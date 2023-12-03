<div class="container dark:text-slate-200">
    <section>
        <a href="{{ route('students.create') }}">Ajouter un étudiant</a>
    </section>
    <section>
        <x-table>
            <thead>
                <th><input type="checkbox"></th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>École</th>
                <th>Nbr de cours inscrits</th>
                <th>Nbr de sessions suivies</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="cursor-pointer" wire:click='show({{ $student->id }})' wire:key='{{ $student->id }}'>
                        <td x-on:click='$event.stopPropagation()'><input type="checkbox"></td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->school->sigle }}</td>
                        <td>{{ $student->courses->count() }}</td>
                        <td>{{ $student->sessions->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    </section>
</div>
