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
            <a href="{{ route('home') }}">
                <img src="{{ asset('/resources/assets/cnmp.png') }}" alt="Le Logo de la CNMP" /></a>
            <h1>@yield('title')</h1>
            @auth
                <div class="flex items-center gap-2 fill-white">
                    <div class="dropdown">
                        <p tabindex="0" class="h-7">
                            <img class="h-full" src="{{ Auth::user()->profile }}" alt="Profile Picture">
                        </p>
                        <ul tabindex="0" class="back dropdown-content">
                            <a href="{{ route('dashboard.index') }}">Dashboard</a>
                            <form action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-primary px-1 py-1 text-sm">
                                    Logout
                                </button>
                            </form>
                        </ul>
                    </div>
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
