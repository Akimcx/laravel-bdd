<form {{ $attributes->merge(['class' => 'dark:bg-gray-950 rounded border p-4']) }}>
    {{ $slot }}
</form>
