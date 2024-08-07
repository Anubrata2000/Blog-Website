{{-- <section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
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

        .btn-danger {
            background-color: #dc3545;
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

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-secondary {
            background-color: #6c757d;
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

        .btn-secondary:hover {
            background-color: #5a6268;
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

        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.active {
            visibility: visible;
            opacity: 1;
        }

        .modal-content {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            max-width: 500px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Delete Account Section -->
        <div class="card">
            <header>
                <h2>Delete Account</h2>
                <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before
                    deleting your account, please download any data or information that you wish to retain.</p>
            </header>

            <button class="btn-danger" onclick="openModal()">Delete Account</button>

            <div id="confirm-user-deletion" class="modal">
                <div class="modal-content">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <h2>Are you sure you want to delete your account?</h2>
                        <p>Once your account is deleted, all of its resources and data will be permanently deleted.
                            Please enter your password to confirm you would like to permanently delete your account.</p>

                        <div class="input-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" placeholder="Password" required />
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn-secondary" onclick="closeModal()">Cancel</button>
                            <button type="submit" class="btn-danger">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('confirm-user-deletion').classList.add('active');
        }

        function closeModal() {
            document.getElementById('confirm-user-deletion').classList.remove('active');
        }
    </script>
</body>

</html>
