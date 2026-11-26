<!DOCTYPE html>
<html>

<head>
    <title>All Tasks</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <h1>Tasks for Today Management System</h1>

    <nav>
        <a href="/">Home</a> |
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
        <h1>Edit Task</h1>

        <form
            action="/tasks/{{ $task->id }}"
            method="POST">

            @csrf
            @method('PUT')
            <p>
                <label for="title">Title:</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ $task->title }}">
            </p>
            <p>
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="pending" {{ $task->status=='pending' ? 'selected' : '' }}>
                        Pending
                    </option>
                    <option value="completed" {{ $task->status=='done' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>
            </p>
            <p>
                <label for="task_date">Date:</label>
                <input
                    type="date"
                    id="task_date"
                    name="task_date"
                    value="{{ $task->task_date }}"
                    required>
            </p>
            <button type="submit">
                Update
            </button>
        </form>
    </div>

</body>

</html>