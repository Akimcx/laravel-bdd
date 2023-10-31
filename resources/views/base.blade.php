<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title') | CNMP </title>
</head>

<body class="h-full min-h-screen dark:bg-gray-600 dark:text-gray-950">
    <header class="mb-10 bg-gray-800 p-4 text-white shadow-lg">
        <div class="container mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}"><img src="{{ asset('/resources/assets/cnmp.png') }}"
                    alt="Le Logo de la CNMP" /></a>
            <h1>@yield('title')</h1>
            @auth
                <div class="flex items-center gap-2 fill-white">
                    <p>{{ Auth::user()->name }}</p>
                    <form action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-primary px-1 py-1 text-sm">
                            Logout
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg> --}}
                        </button>
                    </form>
                </div>
            @else
                <div class="flex gap-1">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            @endauth
        </div>
    </header>
    @yield('content')
</body>

</html>
