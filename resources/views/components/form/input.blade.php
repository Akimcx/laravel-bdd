@props(['label', 'textarea' => false, 'name' => strtolower($label), 'divClass' => ''])
<div class="{{ $divClass }} relative dark:bg-inherit">
    <input
        {{ $attributes->merge(['class' => 'w-full peer rounded border bg-transparent p-2 focus-visible:outline focus-visible:outline-1 focus-visible:outline-offset-1 focus-visible:placeholder:hidden']) }}
        placeholder="{{ $label }}" id="{{ $name }}" name="{{ $name }}" />
    <label
        class="visible absolute left-2 top-0 -translate-y-1/2 scale-100 px-2 transition-[scale_top] peer-placeholder-shown:invisible peer-placeholder-shown:scale-0 dark:bg-inherit"
        for="{{ $name }}">{{ $label }}</label>
    @error($name)
        <p>{{ $message }}</p>
    @enderror
</div>
