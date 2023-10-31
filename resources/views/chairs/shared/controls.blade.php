<div class="container flex gap-4 bg-gray-800 p-2">
    <a class="btn btn-primary" href="{{ route('students.create') }}">Ajouter</a>
    <a class="btn btn-primary" href="{{ route('chairs.edit', ['chair' => $chair]) }}">Mettre à jour</a>
    <form>
        @csrf
        @method('delete')
        <button class="btn btn-primary">Supprimer</button>
    </form>
    <a class="btn btn-primary" href="{{ route('chairs.edit', ['chair' => $chair]) }}">Filtrer</a>
</div>
