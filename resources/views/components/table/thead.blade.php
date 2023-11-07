@props(['title', 'align' => 'left', 'sortBy'])
<th class="cursor-pointer px-3 py-3">
    <div class="flex items-center gap-1">
        {{ $title }}
        <div class="relative" x-data="{ open: false }">
            <x-dropdown>
                <x-slot name="trigger">
                    <x-carret-down></x-carret-down>
                </x-slot>
                <x-slot name="content">
                    <div class="absolute right-0 w-48 rounded p-1 dark:bg-gray-700">
                        <x-table.dropdown-link route="{{ route('chairs.index') }}">
                            <input type="text" name="order_asc" value="{{ $sortBy }}" hidden>
                            <button class="w-full text-left">Trier A -> Z</button>
                        </x-table.dropdown-link>
                        <x-table.dropdown-link route="{{ route('chairs.index') }}">
                            <input type="text" name="order_desc" value="{{ $sortBy }}" hidden>
                            <button class="w-full text-left">Trier Z -> A</button>
                        </x-table.dropdown-link>

                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</th>
