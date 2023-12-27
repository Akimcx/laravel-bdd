<fieldset class="rounded border p-2" x-cloak x-show="false">
    <legend class="px-2">Cours</legend>
    <x-form class="border-none !p-0">
        <x-icon.x-mark class="rounded p-1 dark:hover:bg-rose-900" wire:click="rset('coursesProperty')"></x-icon.x-mark>
        @foreach (App\Models\Course::all() as $course)
            <div>
                <input id="course-{{ $course->id }}" wire:model.live="coursesProperty" value="{{ $course->id }}"
                    type="checkbox" />
                <label for="course-{{ $course->id }}">{{ $course->title }}
                </label>
            </div>
        @endforeach
    </x-form>
</fieldset>
