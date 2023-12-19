<form {{ $attributes->merge(['class' => 'grid grid-cols-2 gap-4 dark:bg-gray-950 rounded border p-4']) }}>
    {{ $slot }}
</form>
