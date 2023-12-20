<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <section class="mt-4 grid grid-cols-2 gap-4">
        @auth
            <x-form class="grid gap-4" wire:submit='attachInstructor'>
                <x-form.select wire:model='atci' name='atci' label='Affecter un professeurs' multiple>
                    @foreach ($instructors as $instructor)
                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                    @endforeach
                </x-form.select>
                <div>
                    <x-primary-button>Ajouter</x-primary-button>
                </div>
            </x-form>
            @if (!$un_courses->isEmpty())
                <x-form wire:submit='attachCourse'>
                    <x-form.select multiple wire:model.blur='atc' name='atc' label='Ajouter un cours'>
                        @foreach ($un_courses as $un_course)
                            <option value="{{ $un_course->id }}">{{ $un_course->title }}</option>
                        @endforeach
                    </x-form.select>
                    <x-primary-button>Ajouter</x-primary-button>
                </x-form>
            @endif
            @if (!$school->courses->isEmpty())
                <x-form class="grid gap-4" wire:submit='detachCourse'>
                    <x-form.select multiple wire:model.blur='dtc' name='dtc' label='Supprimer un cours'>
                        @foreach ($school->courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </x-form.select>
                    <div>
                        <x-primary-button>Supprimer</x-primary-button>
                    </div>
                </x-form>
            @endif
        @endauth
    </section>
    <form class="mt-4 grid gap-4 rounded border p-4 dark:bg-gray-950">
        <x-form.input label='Sigle' disabled :value="$school->sigle"></x-form.input>
        <x-form.input label='Nom' disabled :value="$school->name"></x-form.input>
        <fieldset class="grid grid-cols-2 gap-4 bg-inherit">
            <details open>
                <summary>Cours disponible</summary>
                <ul>
                    @foreach ($school->courses as $course)
                        <li>
                            <a class="hover:underline"
                                href="{{ route('courses.show', ['course' => $course->id]) }}">{{ $course->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </details>
            <details open>
                <summary>Professeurs</summary>
                <ul>
                    @foreach ($school->instructors as $instructor)
                        <li>{{ $instructor->name }}</li>
                    @endforeach
                </ul>
            </details>
        </fieldset>
        <details class="bg-inherit">
            <summary>Informations de contact</summary>
            <fieldset class="grid grid-cols-2 gap-4 bg-inherit">
                <x-form.input label='Email' disabled :value="$school->email"></x-form.input>
                <x-form.input label='Addresse' disabled :value="$school->address"></x-form.input>
                <x-form.input label='Phone' disabled :value="$school->phone"></x-form.input>
                <x-form.input label='URL' disabled :value="$school->URL"></x-form.input>
            </fieldset>
        </details>
        {{-- <x-form.input class="w-full" label='Cours disponible' disabled :value="$school->instructors"></x-form.input> --}}
    </form>
</div>
