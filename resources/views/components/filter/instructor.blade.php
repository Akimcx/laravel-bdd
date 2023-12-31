<fieldset class="rounded border p-2">
    <legend class="px-2">Professeur</legend>
    <button class="rounded p-1 dark:hover:bg-rose-900">
        <x-icon.x-mark wire:click="rset('instructorsProperty')"></x-icon.x-mark>
    </button>
    <x-form class="border-none !p-0">
        @foreach (App\Models\Instructor::all() as $instructor)
            <div>
                <input id="instructor-{{ $instructor->id }}" wire:model.live="instructorsProperty"
                    value="{{ $instructor->id }}" type="checkbox" />
                <label for="instructor-{{ $instructor->id }}">{{ $instructor->name }}
                </label>
            </div>
        @endforeach
    </x-form>
</fieldset>
