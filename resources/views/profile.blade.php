<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <h1>Tasks for Today Management System</h1>

    <nav>
        <a href="/">Home</a> |
        <a href="/about">About</a> |
        <a href="/tasks">Task List</a> |
        <a href="/profile">Profile</a> |
        @auth
        <a href="{{ route('create') }}" class="btn btn-primary">New Task</a> |
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-edit">
                Logout
            </button>
        </form>

        @endauth
        @guest

        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

        @endguest
    </nav>

    <div class="container">
        <h1>Profile</h1>

        <p>Username: {{ $user->username }}</p>
        <p>Full Name: {{ $user->full_name }}</p>
        <p>Email: {{ $user->email }}</p>
    </div>

</body>

</html>