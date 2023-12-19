<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-dots-darker dark:bg-dots-lighter relative min-h-screen bg-gray-100 bg-center antialiased selection:bg-red-500 selection:text-white dark:bg-gray-900 sm:flex sm:items-center sm:justify-center">
    <header>
        <div class="container">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
        </div>
    </header>
    <main>
        <div class="container">
            @foreach (['Chaire'] as $item)
                <a class="dark:text-slate-200" href="{{ route('sessions.home') }}">{{ $item }}</a>
            @endforeach
        </div>
    </main>
</body>

</html>
