<x-app-layout>
    <x-slot name="header" class="flex">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Facultés') }}
            </h2>
            <div class="flex items-center gap-4">
                <a class="btn btn-primary" href="{{ route('dashboard.facs.create') }}">Ajouter</a>
            </div>
        </div>

    </x-slot>

    <div class="container mx-auto mt-10 w-[95%]">
        @if ($facs->isEmpty())
            <div class="flex items-center justify-center">
                <div class="card flex max-w-md flex-col items-center gap-4">
                    <p class="text-center text-xl font-semibold">Aucune donnée n'est actuellement disponible.</p>
                    <a href="{{ route('dashboard.facs.create') }}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        @else
            @include('dashboard.shared.flash')
            <div class="w-full text-white">
                <div class="mb-2 grid w-full grid-cols-[100px_auto_150px] rounded-md bg-gray-600 p-2">
                    <div>Sigle</div>
                    <div>Nom</div>
                    <div>Action</div>
                </div>
                <div class="flex flex-col gap-4">
                    @foreach ($facs as $fac)
                        <div class="grid grid-cols-[100px_auto_150px] gap-4 border-b p-1">
                            <div class="overflow-hidden text-ellipsis whitespace-nowrap">{{ $fac->sigle }}</div>
                            <div class="overflow-hidden text-ellipsis whitespace-nowrap">{{ $fac->name }}</div>
                            <div class="grid grid-cols-2 gap-4">
                                <a class="btn btn-primary block py-1 text-center"
                                    href={{ route('dashboard.facs.edit', ['fac' => $fac]) }}>Edit</a>
                                @if ($fac->trashed())
                                    <form class="w-full" action="{{ route('dashboard.fac.restore', ['fac' => $fac]) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-danger w-full py-1">Restore</button>
                                    </form>
                                @else
                                    <form class="w-full" action="{{ route('dashboard.facs.destroy', ['fac' => $fac]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger py-1">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
