<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <section>
        <a href="{{ route('sessions.create') }}">Ajouter une session</a>
    </section>
    <x-table>
        <thead>
            <th><input type="checkbox"></th>
            <th>Date</th>
            <th>Cours</th>
            <th>Écoles</th>
            <th>Étudiants</th>
        </thead>
        <tbody>
            @foreach ($sessions as $session)
                <tr class="cursor-pointer" wire:key='{{ $session->id }}' wire:click='show({{ $session->id }})'>
                    <td x-on:click='$event.stopPropagation()'><input wire:model='boxes' type="checkbox"></td>
                    <td>{{ $session->session_date }}</td>
                    <td>{{ $session->courses->title }}</td>
                    <td>{{ $session->schools->sigle }}</td>
                    <td>{{ $session->students()->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</div>
