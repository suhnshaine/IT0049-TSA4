<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Mail\TaskCompletedMail;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where(
            'is_archived',
            false
        )
        ->orderBy('task_date')
        ->get();

        return view(
            'tasks.index',
            compact('tasks')
        );
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'task_date' => 'required'
        ]);

        Task::create([
            'title' => $request->title,
            'status' => $request->status,
            'task_date' => $request->task_date
        ]);

        return redirect('/tasks');
    }

    public function edit(Task $task)
    {
        return view(
            'tasks.edit',
            compact('task')
        );
    }

    public function update(
        Request $request,
        Task $task
    ){
        $request->validate([
            'title' => 'required',
            'task_date' => 'required'
        ]);

        $oldStatus = $task->status;

        $task->update([
            'title' => $request->title,
            'status' => $request->status,
            'task_date' => $request->task_date
        ]);

        if(
            $oldStatus != 'done' &&
            $request->status == 'done'
        ){
            Mail::to(
                config('mail.test_recipient')
            )->send(
                new TaskCompletedMail($task)
            );
        }

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->update([
            'is_archived' => true
        ]);

        return redirect('/tasks');
    }
}