<?php

namespace App\Mail;

use App\Models\Task;
use Illuminate\Mail\Mailable;

class TaskCompletedMail
extends Mailable
{
    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function build()
    {
        return $this
            ->subject(
                'Task Completed'
            )
            ->view(
                'emails.task-completed'
            );
    }
}