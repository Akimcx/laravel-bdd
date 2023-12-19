<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>
    <form class="dark:bg-gray-800 dark:text-slate-200" wire:submit="register">
        <!-- Name -->
        <div class="grid grid-cols-2 gap-2 bg-inherit">
            <x-form.input class="w-full" autofocus name="first_name" wire:model="first_name"
                :label="__('Prénom')"></x-form.input>
            <x-form.input class="w-full" autofocus name="last_name" wire:model="last_name"
                :label="__('Nom')"></x-form.input>
        </div>

        <!-- Email Address -->
        <div class="mt-4 bg-inherit">
            <x-form.input class="w-full" wire:model="email" type="email" :label="__('Email')"></x-form.input>
        </div>

        <!-- Password -->
        <div class="mt-4 bg-inherit">
            <x-form.input class="w-full" wire:model="password" type="password" :label="__('Password')"></x-form.input>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 bg-inherit">
            <x-form.input class="w-full" wire:model="password_confirmation" name="password_confirmation" type="password"
                :label="__('Confirm Password')"></x-form.input>
        </div>

        <div class="mt-4 flex items-center justify-end bg-inherit">
            <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
