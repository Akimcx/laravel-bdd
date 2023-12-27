<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <x-toolbar>
        @auth
            <a class="rounded p-1 dark:hover:bg-gray-700"
                href="{{ route('students.create') }}"><x-icon.add-user></x-icon.add-user></a>
            <a class="rounded p-1 dark:hover:bg-gray-700"
                href="{{ route('students.create', ['student' => $student->id]) }}"><x-icon.edit></x-icon.edit></a>
        @endauth
    </x-toolbar>
    <section>
        <x-form class="mt-4">
            <fieldset class="grid grid-cols-2 gap-2 rounded border bg-inherit p-2">
                <legend class="px-2">Information Personnelles</legend>
                <x-form.input :value="$student->first_name" label='Prénom' disabled></x-form.input>
                <x-form.input :value="$student->last_name" label='Nom' disabled></x-form.input>
            </fieldset>
            <fieldset class="grid grid-cols-2 gap-2 rounded border bg-inherit p-2">
                <legend class="px-2">Cours et Écoles</legend>
                <x-form.select multiple disabled label='Cours'>
                    @foreach ($student->courses as $course)
                        <option selected value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </x-form.select>
                <x-form.input label='Écoles' :value="$student->school->sigle" disabled></x-form.input>
            </fieldset>
            <fieldset class="grid gap-2 rounded border bg-inherit p-2">
                <legend class="px-2">Session</legend>
                @if ($student->sessions->isEmpty())
                    <p>Aucune session n'a été suivie.</p>
                    <details>
                        <summary>Ajouter a une session</summary>
                        <ul>
                            @foreach ($sessions as $session)
                                <li>{{ $session->session_date->format('d M') }}-{{ $session->course->title }}</li>
                            @endforeach
                        </ul>
                    </details>
                @else
                    <ul>
                        @foreach ($student->sessions as $session)
                            <a class="hover:underline" href="{{ route('sessions.show', ['session' => $session->id]) }}">
                                <li>
                                    {{ $session->session_date->format('d M') }}
                                    -
                                    {{ $session->course->title }}
                                    -
                                    {{ $session->pivot->is_present ? 'Present' : 'Absent' }}
                                </li>
                            </a>
                        @endforeach
                    </ul>
                @endif
            </fieldset>
            <fieldset class="grid gap-2 rounded border bg-inherit p-2">
                <legend class="px-2">Notes</legend>
                @if ($student->notes->isEmpty())
                    <p>Aucune note donnée.</p>
                    <details class="bg-inherit">
                        <summary>Ajouter une note</summary>
                        <x-form class="bg-inherit">
                            <x-form.select :label="__('Cours')">
                                <option value="">Choisir</option>
                                @foreach ($student->courses as $course)
                                    <option>{{ $course->title }}</option>
                                @endforeach
                            </x-form.select>
                        </x-form>
                    </details>
                @else
                    <ul>
                        @foreach ($student->sessions as $session)
                            <a class="hover:underline"
                                href="{{ route('sessions.show', ['session' => $session->id]) }}">
                                <li>
                                    {{ $session->session_date->format('d M') }}
                                    -
                                    {{ $session->course->title }}
                                    -
                                    {{ $session->pivot->is_present ? 'Present' : 'Absent' }}
                                </li>
                            </a>
                        @endforeach
                    </ul>
                @endif
            </fieldset>
        </x-form>
    </section>
</div>
