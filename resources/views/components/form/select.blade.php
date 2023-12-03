@props(['label', 'name' => strtolower($label)])
<div class="relative bg-inherit dark:text-slate-200">
    <select
        {{ $attributes->merge(['class' => 'w-full peer rounded border p-2 bg-inherit py-4 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-1 focus-visible:placeholder:hidden dark:focus-visible:outline-slate-200']) }}
        placeholder="{{ $label }}" id="{{ $name }}" name="{{ $name }}">
        <option value="">-- Choisir --</option>
        {{ $slot }}
    </select>
    <label
        class="visible absolute left-2 top-0 -translate-y-1/2 scale-100 px-2 transition-[scale_top] peer-placeholder-shown:invisible peer-placeholder-shown:scale-0 dark:bg-inherit"
        for="{{ $name }}">{{ $label }}</label>
    @error($name)
        <p>{{ $message }}</p>
    @enderror
</div>
