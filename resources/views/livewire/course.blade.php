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
        <x-toolbar>
            @auth
                <a class="rounded p-1 dark:hover:bg-gray-700"
                    href='{{ route('courses.create') }}'><x-icon.sign-plus></x-icon.sign-plus></a>
                <form wire:confirm='pa vin fe kk la nn baz' wire:submit='remove' @class(['hidden' => sizeof($boxes) === 0])>
                    <button><x-icon.delete></x-icon.delete> </button>
                </form>
            @endauth
            <x-icon.filter x-on:click="open = !open">
                <x-secondary-button
                    class="border-none !bg-transparent !p-0 hover:underline focus:!ring-0 dark:text-red-500"
                    wire:click="rset('schoolsProperty','instructorsProperty')">Reset</x-secondary-button>
                <x-filter.school></x-filter.school>
                <x-filter.instructor></x-filter.instructor>
            </x-icon.filter>
        </x-toolbar>
        <section class="mt-4">
            <x-table>
                <x-table.thead class="dark:bg-gray-700">
                    <x-table.th class="p-1">Titre</x-table.th>
                    <th>Nbr d'étudiants</th>
                    <th>Nbr de sessions</th>
                </x-table.thead>
                <x-table.tbody class="divide-y">
                    @foreach ($courses as $course)
                        <x-table.tr :value="$course->id" class="cursor-pointer dark:bg-gray-800 dark:even:bg-gray-700"
                            wire:click='show({{ $course->id }})' wire:key='{{ $course->id }}'>
                            <td class="p-1">{{ $course->title }}</td>
                            <td>{{ $course->students()->count() }}</td>
                            <td>{{ $course->sessions()->count() }}</td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table>
        </section>
    @endif
</div>
