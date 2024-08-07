<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/home') }}">Home</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endguest
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">My Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.update') }}">Edit Account</a>
                </li>
            @endauth
        </ul>
        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="form-inline ml-3">
                @csrf
                <button type="submit" class="btn btn-outline-danger my-2 my-sm-0">Logout</button>
            </form>
        @endauth
    </div>
</nav>

<style>
    .navbar {
        padding: 1rem;
        background-color: #f8f9fa;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .navbar-brand {
        font-weight: bold;
        color: #007bff;
        font-size: 1.5rem;
        transition: color 0.3s;
    }

    .navbar-brand:hover {
        color: #0056b3;
    }

    .navbar-nav .nav-link {
        color: #343a40;
        font-size: 1.1rem;
        font-weight: 500;
        transition: color 0.3s;
    }

    .navbar-nav .nav-link.active {
        color: #007bff;
    }

    .navbar-nav .nav-link:hover {
        color: #0056b3;
    }

    .navbar-toggler {
        border-color: #007bff;
    }

    .navbar-toggler-icon {
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"%3E%3Cpath stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"/%3E%3C/svg%3E');
    }

    .form-inline {
        display: flex;
        align-items: center;
    }

    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }
</style>
