{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
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
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        .login-container {
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .login-title {
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: #343a40;
        }

        .form-control:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 0 .2rem rgba(111, 66, 193, 0.25);
        }

        .btn-custom {
            background: linear-gradient(45deg, #ff6f61, #ff9a8b);
            border: none;
            color: #fff;
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #ff9a8b, #ff6f61);
            border: none;
            color: #fff;
        }

        .error-message {
            font-size: 0.875rem;
            color: #dc3545;
        }

        .forgot-password {
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-container">
                    <h1 class="login-title">Login</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                class="form-control">
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" required class="form-control">
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                            <label for="remember_me" class="form-check-label">Remember Me</label>
                        </div>

                        <button type="submit" class="btn btn-custom w-100">Login</button>

                        <div class="mt-3 text-center">
                            <a href="{{ route('password.request') }}"
                                class="text-decoration-none forgot-password">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
