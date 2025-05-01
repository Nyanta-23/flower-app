<x-guest-layout>

    <div class="app-auth-body mx-auto">
        <div class="app-auth-branding mb-4">
            <b>Plant</b>Scan
        </div>
        <h2 class="auth-heading text-center mb-5">Register in to Apps</h2>
        <div class="auth-form-container text-start">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="email mb-3">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full form-control email" type="text"
                        name="name" :value="old('name')" placeholder="Name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="email mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full form-control email" type="email"
                        name="email" :value="old('email')" placeholder="Email Address" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="password mb-3">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full form-control password" placeholder="Password"
                        type="password" name="password" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="password mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full form-control password"
                        placeholder="Confirm Password" type="password" name="password_confirmation" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <div class="text-center">

                        <x-primary-button class="app-btn-primary btn w-100 theme-btn mx-auto">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </div>

                <div class="col-12 mt-1 fs-6">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
