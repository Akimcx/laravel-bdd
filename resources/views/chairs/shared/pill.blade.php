@php
    switch ($label) {
        case 'Professeur':
            $name = 'M.' . ' ' . $chair->prof->last_name;
            break;
        case 'Faculté':
            $name = $chair->fac->sigle;
            break;
        case 'Vacation':
            $name = $chair->vacation;
            break;
        case 'Date':
            $name = $chair->dates;
            break;
        default:
            break;
    }
@endphp

<div class="flex rounded border-2 border-gray-800">
    <p class="bg-gray-800 p-1">{{ $label }}</p>
    <p class="p-1">{{ $name }}</p>
</div>
