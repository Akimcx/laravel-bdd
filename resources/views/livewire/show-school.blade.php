<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <div class="mt-4 grid grid-cols-2 gap-4">
        @if (!$un_courses->isEmpty())
            <form class="rounded border p-4 dark:bg-gray-950" wire:submit='attachCourse'>
                <x-form.select wire:model.blur='atc' name='atc' label='Ajouter un cours'>
                    @foreach ($un_courses as $un_course)
                        <option value="{{ $un_course->id }}">{{ $un_course->title }}</option>
                    @endforeach
                </x-form.select>
                <button>Ajouter</button>
            </form>
        @endif
        @if (!$school->courses->isEmpty())
            <form class="rounded border p-4 dark:bg-gray-950" wire:submit='detachCourse'>
                <x-form.select wire:model.blur='dtc' name='dtc' label='Supprimer un cours'>
                    @foreach ($school->courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </x-form.select>
                <button>Supprimer</button>
            </form>
        @endif
    </div>
    <form class="mt-4 grid gap-4 rounded border p-4 dark:bg-gray-950">
        <x-form.input label='Sigle' disabled :value="$school->sigle"></x-form.input>
        <x-form.input label='Nom' disabled :value="$school->name"></x-form.input>
        <x-form.input label='Email' disabled :value="$school->email"></x-form.input>
        <x-form.input label='Addresse' disabled :value="$school->address"></x-form.input>
        <x-form.input label='Phone' disabled :value="$school->phone"></x-form.input>
        <x-form.input label='URL' disabled :value="$school->URL"></x-form.input>
        <x-form.input label='Cours disponible' disabled :value="$school->courses->count()"></x-form.input>
        {{-- <x-form.input class="w-full" label='Cours disponible' disabled :value="$school->instructors"></x-form.input> --}}
    </form>
</div>
