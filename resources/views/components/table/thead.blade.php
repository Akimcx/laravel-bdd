@props(['title', 'sortBy', 'route' => route(Route::currentRouteName(), Route::current()->parameters)])
@aware(['align' => 'right'])
{{-- @dd($route) --}}
{{-- @dd(route(Route::currentRouteName(), Route::current()->parameters)) --}}
{{-- @dd(Route::currentRouteName()) --}}
<th class="cursor-pointer px-3 py-3">
    <div class="flex items-center gap-1">
        {{ $title }}
        <div class="relative" x-data="{ open: false }">
            <x-dropdown :align="$align">
                <x-slot name="trigger">
                    <x-carret-down></x-carret-down>
                </x-slot>
                <x-slot name="content">
                    <x-table.dropdown-link :route>
                        <input type="text" name="order_asc" value="{{ $sortBy }}" hidden>
                        <button class="w-full text-left">Trier A -> Z</button>
                    </x-table.dropdown-link>
                    <x-table.dropdown-link :route>
                        <input type="text" name="order_desc" value="{{ $sortBy }}" hidden>
                        <button class="w-full text-left">Trier Z -> A</button>
                    </x-table.dropdown-link>
                    {{ $slot }}
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</th>
