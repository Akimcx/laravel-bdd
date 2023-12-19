<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <section class="mt-4">
        @auth
            <a href="{{ route('sessions.create') }}">Ajouter une session</a>
        @endauth
    </section>
    <section class="mt-4">
        <x-table check>
            <x-table.thead class="">
                <th class="p-1">Date</th>
                <th>Cours</th>
                <th>École</th>
                <th>Nbr Étudiants</th>
                <th>Professeur</th>
            </x-table.thead>
            <x-table.tbody class="">
                @foreach ($sessions as $session)
                    <x-table.tr class="cursor-pointer text-center" :value="$session->id" wire:key='{{ $session->id }}'
                        wire:click='show({{ $session->id }})'>
                        <td class="p-1">{{ $session->session_date->format('d M') }}</td>
                        <td>{{ $session->course->title }}</td>
                        <td>{{ $session->school->sigle }}</td>
                        <td>{{ $session->students()->count() }}</td>
                        <td>{{ $session->instructor->name }}</td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </section>
</div>
