@props(['key' => null, 'route' => route(Route::currentRouteName(), Route::current()->parameters)])
@php
    if ($key) {
        $klass = 'relative';
    } else {
        $klass = '';
    }
@endphp
<th {{ $attributes->merge(['class' => "$klass"]) }} x-data="{ up: true }">
    {{ $slot }}
    @if ($key !== null)
        <x-icon.carret-down class="absolute right-0 top-1/2 -translate-y-1/2 cursor-pointer dark:fill-slate-200"
            x-on:click="up=!up" x-show="!up" wire:click="sortDesc('{{ $key }}')"></x-icon.carret-down>
        <x-icon.carret-up class="absolute right-0 top-1/2 -translate-y-1/2 cursor-pointer dark:fill-slate-200"
            x-on:click="up=!up" x-show="up" wire:click="sortAsc('{{ $key }}')"></x-icon.carret-up>
    @endif
</th>
