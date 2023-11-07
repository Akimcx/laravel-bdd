<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>@yield('title') | CNMP </title>
</head>

<body class="h-full min-h-screen dark:bg-gray-600 dark:text-gray-950">
    <header class="mb-5 bg-gray-800 p-4 text-white shadow-lg">
        <div class="container mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}">
                <img src="assets/cnmp.png" alt="Le Logo de la CNMP" /></a>
            <h1>@yield('title')</h1>
            @auth
                <div class="flex items-center gap-2 fill-white" x-data="{ open: false }">


                    <!-- Settings Dropdown -->
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
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


{{-- <x-app-layout>
    <x-slot name="header">
        <h1>@yield('title')</h1>
        @auth
            <div class="flex items-center gap-2 fill-white">
                <!-- Settings Dropdown -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex h-12 items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                                <img class="h-full" src={{ Auth::user()->profile }} />

                                <div class="ml-1">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
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
            </div>
        @else
            <div class="flex gap-2">
                <a class="rounded p-1 dark:bg-gray-700" href="{{ route('login') }}">Login</a>
                <a class="rounded p-1 dark:bg-gray-500" href="{{ route('register') }}">Register</a>
            </div>
        @endauth
    </x-slot>
    @yield('content')

</x-app-layout> --}}
