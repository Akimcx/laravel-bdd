{{-- <div class="container flex gap-4 rounded bg-gray-800 p-2"> --}}
<button id="add" class="btn btn-primary">Ajouter</button>
<a class="btn btn-primary" href="{{ route('chairs.edit', ['chair' => $chair]) }}">Modifier</a>
@auth
    <form>
        @csrf
        @method('delete')
        <button class="btn btn-primary">Supprimer</button>
    </form>
@endauth

{{-- </div> --}}
