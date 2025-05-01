<x-guest-layout>
    <!-- Session Status -->


    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

    <div class="app-auth-body mx-auto">
        <div class="app-auth-branding mb-4">
            <b>Plant</b>Scan
        </div>
        <h2 class="auth-heading text-center mb-5">Log in to Apps</h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="auth-form-container text-start">
            <form class="auth-form login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="email mb-3">
                    <label class="sr-only" for="email">Email</label>
                    <input id="email" name="email" type="email" class="form-control email"
                        placeholder="Email address" required="required">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="password mb-3">
                    <label class="sr-only" for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control password"
                        placeholder="Password" required="required">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div><!--//form-group-->
                <div class="extra mt-3 row justify-content-between">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="RememberPassword"
                                name="remember">
                            <label class="form-check-label" for="RememberPassword">
                                Remember me
                            </label>
                        </div>
                    </div><!--//col-6-->
                    <div class="col-6">
                        <div class="forgot-password text-end">
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                    </div><!--//col-6-->
                </div><!--//extra-->
                <div class="text-center">
                    <button type="submit" class="app-btn-primary btn w-100 theme-btn mx-auto">
                        Log in
                    </button>
                </div>
                <div class="col-12 mt-1 fs-6">
                    <a href="{{ route('register') }}">Don't Have Account?</a>
                </div>
            </form>
        </div><!--//auth-form-container-->

    </div>
</x-guest-layout>
