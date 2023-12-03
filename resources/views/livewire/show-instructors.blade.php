<div class="container dark:text-slate-200">
    <section>
        <div>
            <table>
                <thead>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Nombre de cours dispensés</th>
                </thead>
                <tbody>
                    @foreach ($instructors as $instructor)
                        <tr>
                            <td>{{ $instructor->first_name }}</td>
                            <td>{{ $instructor->last_name }}</td>
                            <td>{{ $instructor->phone }}</td>
                            <td>{{ $instructor->courses->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
