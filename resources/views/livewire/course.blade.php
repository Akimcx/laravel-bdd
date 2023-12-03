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
            <a href='{{ route('courses.create') }}'>Ajouter</a>
            <form wire:confirm='pa vin fe kk la nn baz' wire:submit='remove'>
                <button @disabled(sizeof($boxes) === 0)>Supprimer</button>
            </form>
        </section>
        <section>
            <x-table>
                <thead class="dark:bg-gray-700">
                    <th><input x-on:click="$dispatch('boxes',{state: $el.checked})" type="checkbox"></th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Nbr d'étudiants</th>
                    <th>Nbr de sessions</th>
                </thead>
                <tbody class="divide-y">
                    @foreach ($courses as $course)
                        <tr class="cursor-pointer dark:bg-gray-800 dark:even:bg-gray-700"
                            wire:click='show({{ $course->id }})' wire:key='{{ $course->id }}'>
                            <td x-on:click='$event.stopPropagation()'>
                                <input x-on:boxes.window='$el.checked = $event.detail.state' wire:model.lazy='boxes'
                                    value="{{ $course->id }}" type="checkbox">
                            </td>
                            <td>{{ $course->title }}</td>
                            <td>{{ Str::words($course->description, 5) }}</td>
                            <td>{{ $course->students()->count() }}</td>
                            <td>{{ $course->sessions()->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </x-table>
        </section>
    @endif
</div>
