<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.header') <!-- Include your header layout -->

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')
        <!-- Page Content -->
        <main class="container py-5">
            {{ $slot }}
        </main>
    </div>
</body>
@include('layouts.partials.footer')

</html>
