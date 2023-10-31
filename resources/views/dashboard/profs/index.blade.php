<x-app-layout>
    <x-slot name="header" class="flex">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Professeurs') }}
            </h2>
            <div class="flex items-center gap-4">
                <a class="btn btn-primary" href="{{ route('dashboard.profs.create') }}">Ajouter</a>
            </div>
        </div>

    </x-slot>

    <div class="container mx-auto mt-10 w-[95%]">
        @empty($profs)
            <div class="flex items-center justify-center">
                <div class="card flex max-w-md flex-col items-center gap-4">
                    <p class="text-center text-xl font-semibold">Aucune donnée n'est actuellement disponible.</p>
                    <a href="{{ route('dashboard.profs.create') }}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        @else
            @include('dashboard.shared.flash')
            <table class="w-full text-white">
                <thead class="w-full">
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    @foreach ($profs as $prof)
                        <tr>
                            <td>{{ $prof->first_name }}</td>
                            <td>{{ $prof->last_name }}</td>
                            <td class="grid grid-cols-2 gap-4">
                                <a class="btn btn-primary block py-1 text-center"
                                    href={{ route('dashboard.profs.edit', ['prof' => $prof]) }}>Edit</a>
                                @if ($prof->trashed())
                                    <form class="w-full" action="{{ route('dashboard.prof.restore', ['prof' => $prof]) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-danger w-full py-1">Restore</button>
                                    </form>
                                @else
                                    <form class="w-full" action="{{ route('dashboard.profs.destroy', ['prof' => $prof]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger w-full py-1">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endempty
    </div>
</x-app-layout>
