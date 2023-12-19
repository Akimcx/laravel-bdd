<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    @if ($courses->isEmpty())
        <section class="grid h-screen place-items-center dark:text-slate-200">
            <div class="flex flex-col gap-4 rounded border p-2 drop-shadow-2xl">
                <p class="text-lg font-bold">Aucun cours dispensés pour le moment</p>
                <a href="{{ route('courses.create') }}" wire:navigate
                    class="rounded border p-2 text-center dark:border-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700">
                    Ajouter un cours</a>
            </div>
        </section>
    @else
        <section>
            @auth
                <a href='{{ route('courses.create') }}'>Ajouter</a>
                <form wire:confirm='pa vin fe kk la nn baz' wire:submit='remove'>
                    <button @disabled(sizeof($boxes) === 0)>Supprimer</button>
                </form>
            @endauth
        </section>
        <section class="mt-4">
            <x-table>
                <x-table.thead class="dark:bg-gray-700">
                    <th>Titre</th>
                    <th>Nbr d'étudiants</th>
                    <th>Nbr de sessions</th>
                </x-table.thead>
                <x-table.tbody class="divide-y">
                    @foreach ($courses as $course)
                        <x-table.tr :value="$course->id" class="cursor-pointer dark:bg-gray-800 dark:even:bg-gray-700"
                            wire:click='show({{ $course->id }})' wire:key='{{ $course->id }}'>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->students()->count() }}</td>
                            <td>{{ $course->sessions()->count() }}</td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table>
        </section>
    @endif
</div>
