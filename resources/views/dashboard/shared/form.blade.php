@include('dashboard.shared.flash')
@isset($prof)
    <form method="post"
        @if ($action === 'edit') action="{{ route('dashboard.profs.update', ['prof' => $prof]) }}"
@else action="{{ route('dashboard.profs.store') }}" @endif
        class="card mt-6 space-y-6">
    @else
        <form method="post"
            @if ($action === 'edit') action="{{ route('dashboard.facs.update', ['fac' => $fac]) }}"
@else action="{{ route('dashboard.facs.store') }}" @endif
            class="card mt-6 space-y-6">
        @endisset
        @isset($method)
            @method('patch')
        @endisset
        @csrf
        <h2 class="text-center text-lg font-semibold text-gray-900 dark:text-gray-100">
            {{ $title ?? __('Ajouter') }}
        </h2>
        @isset($prof)
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $prof->first_name)"
                    required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>
            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $prof->last_name)"
                    required />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>
        @else
            <div>
                <x-input-label for="sigle" :value="__('Sigle')" />
                <x-text-input id="sigle" name="sigle" type="text" class="mt-1 block w-full" :value="old('sigle', $fac->sigle)"
                    required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('sigle')" />
            </div>
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $fac->name)"
                    required />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
        @endisset

        <div class="flex items-center justify-center gap-4">
            <x-primary-button>{{ $title ?? __('Ajouter') }}</x-primary-button>
        </div>
    </form>
