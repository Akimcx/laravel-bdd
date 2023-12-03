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
    <form class="dark:bg-gray-800" wire:submit="register">
        <!-- Name -->
        <div class="grid grid-cols-2 gap-2 bg-inherit">
            <x-form.input class="w-full" autofocus name="first_name" wire:model="first_name"
                :label="__('Prénom')"></x-form.input>
            {{-- <x-input-label for="first_name" :value="__('Prénom')" />
            <x-text-input wire:model="first_name" id="first_name" class="mt-1 block w-full" type="text" name="first_name"
                required autofocus />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" /> --}}
            {{-- </div> --}}

            <!-- Name -->
            {{-- <div class="mt-4"> --}}
            <x-form.input class="w-full" autofocus name="last_name" wire:model="last_name"
                :label="__('Nom')"></x-form.input>

            {{-- <x-input-label for="last_name" :value="__('Nom')" />
            <x-text-input wire:model="last_name" id="last_name" class="mt-1 block w-full" type="text" name="last_name"
                required autofocus />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" /> --}}
        </div>

        <!-- Email Address -->
        <div class="mt-4 bg-inherit">
            <x-form.input class="w-full" wire:model="email" type="email" :label="__('Email')"></x-form.input>
            {{-- <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="mt-1 block w-full" type="email" name="email"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <!-- Password -->
        <div class="mt-4 bg-inherit">
            <x-form.input class="w-full" wire:model="password" type="password" :label="__('Password')"></x-form.input>

            {{-- <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="mt-1 block w-full" type="password" name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 bg-inherit">
            <x-form.input class="w-full" wire:model="password_confirmation" name="password_confirmation" type="password"
                :label="__('Confirm Password')"></x-form.input>

            {{-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="mt-1 block w-full"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
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
