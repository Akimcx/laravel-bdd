<x-app-layout>
    <x-slot name="header" class="flex">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Étudiants') }}
            </h2>
            <div class="flex items-center gap-4">
                <a class="btn btn-primary" href="{{ route('dashboard.students.create') }}">Ajouter</a>
            </div>
        </div>

    </x-slot>

    <div class="container mx-auto mt-10 w-[95%]">
        @empty($students)
            <div class="flex items-center justify-center">
                <div class="card flex max-w-md flex-col items-center gap-4">
                    <p class="text-center text-xl font-semibold">Aucune donnée n'est actuellement disponible.</p>
                    <a href="{{ route('dashboard.profs.create') }}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        @else
            @include('dashboard.shared.flash')
            <div class="w-full text-slate-100">
                <div class="grid w-full grid-cols-4 bg-gray-600">
                    <p>Prénom</p>
                    <p>Nom</p>
                    <p>Cours suivis</p>
                    <p>Action</p>
                </div>
                <div class="">
                    @foreach ($students as $student)
                        <div class="grid grid-cols-4 items-center border-b-2 bg-gray-800 p-1 hover:bg-gray-900">
                            <p>{{ $student->last_name }}</p>
                            <p>{{ $student->first_name }}</p>
                            <div>
                                <ul>
                                    <li>{{ $student->chair->dates }}</li>
                                </ul>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <a class="rounded bg-gray-500 text-center"
                                    href={{ route('dashboard.students.edit', ['student' => $student]) }}>Edit</a>
                                @if ($student->trashed())
                                    <form class="w-full"
                                        action="{{ route('dashboard.prof.restore', ['prof' => $student]) }}" method="post">
                                        @csrf
                                        <button class="">Restore</button>
                                    </form>
                                @else
                                    <form class="w-full"
                                        action="{{ route('dashboard.students.destroy', ['student' => $student]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="rounded px-2 dark:bg-red-500">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $students->links() }}
        @endempty
    </div>
</x-app-layout>
