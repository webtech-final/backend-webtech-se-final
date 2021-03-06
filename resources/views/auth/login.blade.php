@extends('layouts.main')
@section('content')
    <x-guest-layout>

        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <img src=" logo.png " alt="" width="200" height="250">
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                        autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

    @if (session('status'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-tran
            class="bg-green-200 animate-bounce transition ease-out duration-300 border border-green-500 text-xl rounded-lg py-4 px-6 text-green-900 fixed bottom-4 right-4 flex ">
            <span class="">
                {{ session('status') }}
            </span>
        </div>
    @endif
@endsection
