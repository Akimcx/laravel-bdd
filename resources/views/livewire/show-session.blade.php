<div class="container dark:text-slate-200">
    <section class="mt-4">
        <x-table>
            <caption>Liste des étudiants</caption>
            <thead>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Present</th>
            </thead>
            <tbody>
                @foreach ($session->students as $student)
                    <tr>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->pivot->is_present }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    </section>
</div>
