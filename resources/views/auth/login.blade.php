<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <input type="email" name="email" value="{{ old('email') }}" required class="block text-gray-500 placeholder:text-gray-400 mt-1 w-full bg-gray-100 border-gray-300 focus:border-sky-100 rounded-md shadow-sm" placeholder="Ingrese su correo">
            {{-- <x-text-input id="email" class="block placeholder:text-gray-400 mt-1 w-full" type="email" name="email" :value="old('email')"  required autofocus autocomplete="username" /> --}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Contraseña'" />

            {{-- <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" /> --}}
                            <input type="password" name="password" class="block text-gray-500 placeholder:text-gray-400 mt-1 w-full bg-gray-100 border-gray-300 focus:border-sky-100 rounded-md shadow-sm" placeholder="Ingrese su contraseña" required>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">Recordarme</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{-- {{ __('Forgot your password?') }}
                    ¿Olvidaste tu contraseña?
                </a>
            @endif --}}

            <x-primary-button class="ml-3">
                {{-- {{ __('Log in') }} --}}
                Iniciar Sesión
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
