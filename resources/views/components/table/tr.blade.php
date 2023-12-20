@aware(['check'])
{{-- @props(['value']) --}}
<tr {{ $attributes->merge(['class' => 'group text-center dark:bg-gray-800 dark:even:bg-gray-900']) }}>
    @if ($check)
        <td class="p-1" x-on:click='$event.stopPropagation()'>
            <input class="invisible checked:visible group-hover:visible"
                x-on:boxes.window='$el.checked = $event.detail.state' wire:model='boxes' value="{{ $value }}"
                type="checkbox">
        </td>
    @endif
    {{ $slot }}
</tr>
