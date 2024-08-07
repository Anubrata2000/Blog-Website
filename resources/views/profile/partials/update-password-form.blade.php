{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
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
    <title>Update Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
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
            font-size: 20px;
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

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-footer {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-message {
            color: #28a745;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Update Password Section -->
        <div class="card">
            <header>
                <h2>Update Password</h2>
                <p>Ensure your account is using a long, random password to stay secure.</p>
            </header>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <!-- Current Password Input -->
                <div class="input-group">
                    <label for="update_password_current_password">Current Password</label>
                    <input id="update_password_current_password" name="current_password" type="password" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <!-- New Password Input -->
                <div class="input-group">
                    <label for="update_password_password">New Password</label>
                    <input id="update_password_password" name="password" type="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <!-- Confirm New Password Input -->
                <div class="input-group">
                    <label for="update_password_password_confirmation">Confirm Password</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Save Button -->
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Save</button>

                    @if (session('status') === 'password-updated')
                        <p class="status-message">
                            Saved.
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>

</html>
