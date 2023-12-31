<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <x-toolbar>
        @auth
            <a class="relative rounded p-1 dark:hover:bg-gray-700" href="{{ route('sessions.create') }}">
                <x-icon.sign-plus wire:click=''></x-icon.sign-plus>
            </a>
        @endauth
        <x-icon.print x-cloak x-show="false" :disabled="true" wire:click='print'></x-icon.print>
        <x-icon.filter>
            <x-secondary-button class="border-none !bg-transparent !p-0 hover:underline focus:!ring-0 dark:text-red-500"
                wire:click="rset('schoolsProperty','instructorsProperty','coursesProperty')">Reset</x-secondary-button>
            <div wire:loading>...</div>
            <x-filter.school></x-filter.school>
            <x-filter.instructor></x-filter.instructor>
        </x-icon.filter>
    </x-toolbar>
    <section class="mt-4">
        @if ($sessions->isEmpty())
            <div class="grid place-items-center rounded border p-4 dark:bg-gray-950">
                <h1 class="mb-4 text-xl">Aucune Session</h1>
                <x-primary-button><a href="{{ route('sessions.create') }}">Ajouter un session</a></x-primary-button>
            </div>
        @else
            <x-table>
                <x-table.thead class="">
                    <x-table.th class="p-1">Date</x-table.th>
                    <x-table.th>Cours</x-table.th>
                    <th>École</th>
                    <x-table.th>Nbr Étudiants</x-table.th>
                    <x-table.th>Professeur</x-table.th>
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
        @endif
    </section>
    <section class="mt-4">
        {{ $sessions->links() }}
    </section>
</div>
