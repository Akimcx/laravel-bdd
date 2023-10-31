@if (session('success'))
    <p class="mb-2 items-center justify-center rounded-lg bg-gray-800 p-2 text-green-400">
        {!! session('success') !!}
    </p>
@endif
@if (session('error'))
    <p class="mb-2 items-center justify-center rounded-lg bg-gray-800 p-2 text-green-400">
        {!! session('error') !!}
    </p>
@endif
