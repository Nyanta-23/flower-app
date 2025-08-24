{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="app-auth-body mx-auto">
        <div class="app-auth-branding mb-4 auth-heading">
            <b>Plant</b>Scan
        </div>
        <h2 class="auth-heading text-center mb-4">Password Reset</h2>

        <div class="auth-intro mb-4 text-center">Enter your email address below. We'll email you a link to a
            page where you can easily create a new password.</div>

        <div class="auth-form-container text-left">

            <form class="auth-form resetpass-form">
                <div class="email mb-3">
                    <label class="sr-only" for="reg-email">Your Email</label>
                    <input id="reg-email" name="reg-email" type="email" class="form-control login-email"
                        placeholder="Your Email" required="required">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">
                        Reset Password
                    </button>
                </div>
            </form>

            <div class="auth-option text-center pt-5">
                <a class="app-link" href="{{ route('login') }}">Log in</a>
            </div>
        </div>
    </div>
</x-guest-layout>
