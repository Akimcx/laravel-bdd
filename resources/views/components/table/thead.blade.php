@aware(['check'])
<thead {{ $attributes->merge(['class' => 'dark:bg-gray-950']) }}>
    @if ($check)
        <th class="p-1"><input x-on:click="$dispatch('boxes',{state: $el.checked})" type="checkbox"></th>
    @endif
    {{ $slot }}
</thead>
