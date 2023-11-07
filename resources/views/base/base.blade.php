<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('script')
    <title>@yield('title') | CNMP</title>
</head>

<body class="h-full min-h-screen dark:bg-gray-600 dark:text-gray-950">
    <header class="mb-5 bg-gray-800 p-4 text-white shadow-lg">
        <div class="container mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}">
                <img src="assets/cnmp.png" alt="Le Logo de la CNMP" /></a>
            <h1>@yield('title')</h1>
            @auth
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <p class="h-7">
                                <img class="h-full" src="{{ Auth::user()->profile }}" alt="Profile Picture">
                            </p>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('home')">
                                {{ __('Home') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="flex gap-2">
                    <a class="rounded p-1 dark:bg-gray-700" href="{{ route('login') }}">Login</a>
                    <a class="rounded p-1 dark:bg-gray-500" href="{{ route('register') }}">Register</a>
                </div>
            @endauth
        </div>
    </header>
    @yield('content')
</body>

</html>


{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | CNMP</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('base.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow dark:bg-gray-800">
                <div {{ $attributes->merge(['class' => 'mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8']) }}>
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html> --}}
