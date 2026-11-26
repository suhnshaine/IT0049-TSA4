<!DOCTYPE html>
<html>

<head>
    <title>Today's Tasks</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <h1>Tasks for Today Management System</h1>

    <nav>
        <a href="/">Dashboard</a> |
        <a href="/about">About</a> |
        <a href="/tasks">Task List</a> |
        <a href="/profile">Profile</a> |
        @auth
        <a href="{{ url('/tasks/create') }}" class="btn btn-primary">New Task</a> |
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">
                Logout
            </button>
        </form>

        @endauth
        @guest

        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

        @endguest
    </nav>

    <div class="container">
        <h1>Today's Tasks</h1>

        <ul>
            @foreach($tasks as $task)
            <li>
                {{ $task->title }}
                ({{ $task->status }})
            </li>
            @endforeach
        </ul>
    </div>

</body>

</html>