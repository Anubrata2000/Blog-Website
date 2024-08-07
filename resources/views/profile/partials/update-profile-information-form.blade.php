{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card header {
            margin-bottom: 20px;
        }

        .card h2 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .card p {
            color: #666;
            font-size: 14px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            font-size: 14px;
        }

        .input-group input:focus {
            border-color: #0056b3;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 86, 179, 0.2);
        }

        .alert {
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 14px;
        }

        .alert-warning {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
        }

        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .btn {
            background-color: #007bff;
            border: none;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .status-message {
            color: #28a745;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <header>
                <h2>Profile Information</h2>
                <p>Update your account's profile information and email address.</p>
            </header>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: none;">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <!-- Name Input -->
                <div class="input-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                        autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <!-- Email Input -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                        required autocomplete="email" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div class="alert alert-warning">
                            Your email address is unverified.
                            <button form="send-verification" class="btn btn-warning">
                                Click here to re-send the verification email.
                            </button>

                            @if (session('status') === 'verification-link-sent')
                                <p class="status-message">
                                    A new verification link has been sent to your email address.
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Save Button -->
                <div class="form-footer">
                    <button type="submit" class="btn">Save</button>

                    @if (session('status') === 'profile-updated')
                        <p class="status-message">
                            Profile updated successfully.
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>

</html>
