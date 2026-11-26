<!DOCTYPE html>
<html>

<head>
    <title>All Tasks</title>
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
        <h1>All Tasks</h1>

        <table border="1">
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>

            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->task_date }}</td>
                <td>
                    @auth
                    <div class="actions">
                        <a class="btn btn-edit" href="/tasks/{{ $task->id }}/edit">
                            Edit
                        </a>
                        <form
                            action="/tasks/{{ $task->id }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-delete" onclick="return confirm('Are you sure you want to archive this task?');">
                                Archive
                            </button>

                        </form>

                    </div>
                    @endauth
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</body>

</html>