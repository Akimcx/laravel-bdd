<fieldset class="rounded border p-2">
    <legend class="px-2">Écoles</legend>
    <x-form class="flex gap-2 border-none !p-0">
        @foreach (App\Models\School::all() as $school)
            <div class="flex justify-center gap-1">
                <label for="school-{{ $school->id }}">{{ $school->sigle }}
                </label>
                <input wire:model.live="schoolsProperty" id="school-{{ $school->id }}" value="{{ $school->id }}"
                    type="checkbox" />
            </div>
        @endforeach
        <x-icon.x-mark class="rounded p-1 dark:hover:bg-rose-900" wire:click="rset('schoolsProperty')"></x-icon.x-mark>
    </x-form>
</fieldset>
