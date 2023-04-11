<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\User;
use App\Mail\TaskCreated;

use Illuminate\Support\Facades\Mail;


class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        //
        Mail::to(User::find(1))->send(new TaskCreated());

    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
