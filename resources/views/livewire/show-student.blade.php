<div class="container dark:text-slate-200">
    <x-flash></x-flash>
    <x-form class="mt-4 grid gap-2 rounded border p-4 dark:bg-gray-950">
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
                        <a href="{{ route('sessions.show', ['session' => $session->id]) }}">
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
            @endempty
    </fieldset>
</x-form>
</div>
