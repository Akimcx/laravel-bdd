<div class="container dark:text-slate-200">
    <section class="mt-4">
        <a href="{{ route('instructors.create') }}">Modifier</a>
    </section>
    <section class="mt-4">
        <x-form>
            <x-form.input label="Nom" :value="$instructor->last_name"></x-form.input>
            <x-form.input label="Prénom" :value="$instructor->first_name"></x-form.input>
            <details>
                <summary>Information de contact</summary>
                <x-form.input label="Téléphone" :value="$instructor->phone"></x-form.input>
                <x-form.input label="Email" :value="$instructor->email"></x-form.input>
            </details>
            <details>
                <summary>Information sur les cours</summary>
                @foreach ($instructor->schools as $school)
                    <details>
                        <summary>{{ $school->sigle }}</summary>
                        @foreach ($instructor->courses()->forSchools($school->id)->get() as $course)
                            <details>
                                <summary>{{ $course->title }}</summary>
                                @foreach ($instructor->sessions as $session)
                                    <details>
                                        <summary>{{ $session->session_date }}</summary>
                                    </details>
                                @endforeach
                            </details>
                        @endforeach
                    </details>
                @endforeach
            </details>
        </x-form>

    </section>
</div>
