@if (session('success') || session('error'))
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)" @class([
        'rounded border py-1 text-center',
        'bg-red-600' => session('error'),
        'bg-green-600' => session('success'),
    ])>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif
    </div>
@endif
