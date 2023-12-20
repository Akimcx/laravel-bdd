<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    @dump($boxes)
    <section class="mt-4 dark:fill-slate-200">
        <a href="{{ route('students.create') }}">Ajouter un étudiant</a>
        <x-icon.delete wire:click='delete' wire:confirmation="sur?"></x-icon.delete>
    </section>
    <section class="mt-4">
        <x-table check>
            <x-table.thead>
                <th>Prénom</th>
                <th>Nom</th>
                <th>École</th>
                <th>Nbr de cours inscrits</th>
                <th>Nbr de sessions suivies</th>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($students as $student)
                    <x-table.tr class="cursor-pointer" :value="$student->id" wire:click='show({{ $student->id }})'
                        wire:key='{{ $student->id }}'>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->school->sigle }}</td>
                        <td>{{ $student->courses->count() }}</td>
                        <td>{{ $student->sessions->count() }}</td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
        <section class="mt-4">{{ $students->links() }}</section>
    </section>
</div>
