<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <section class="mt-4 flex gap-4 rounded p-2 dark:bg-gray-950 dark:fill-slate-200">
        @auth
            <a href="{{ route('students.create') }}"><x-icon.add-user></x-icon.add-user></a>
            <x-icon.delete wire:click='delete' wire:confirmation="sur?"></x-icon.delete>
        @endauth
        <x-icon.print></x-icon.print>
    </section>
    <section class="mt-4">
        <x-table>
            <x-table.thead>
                <th class="p-1">Prénom</th>
                <th>Nom</th>
                <th>École</th>
                <th>Nbr de cours inscrits</th>
                <th>Nbr de sessions suivies</th>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($students as $student)
                    <x-table.tr class="cursor-pointer" :value="$student->id" wire:click='show({{ $student->id }})'
                        wire:key='{{ $student->id }}'>
                        <td class="p-1">{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->school->sigle }}</td>
                        <td>{{ $student->courses->count() }}</td>
                        <td>{{ $student->sessions()->where('pivot_is_present', 1)->get()->count() }}</td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
        <section class="mt-4">{{ $students->links() }}</section>
    </section>
</div>
