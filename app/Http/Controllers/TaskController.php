<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Business;
use App\Models\Person;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.index')->with('tasks',Task::open()->paginate(10));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $targetModel = match($request->input('target_model')){
            'business' => Business::find($request->input('taskable_id')),
            'person' => Person::find($request->input('taskable_id'))
        };

        $targetModel->tasks()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->back();
    }

    public function complete(Request $request, Task $task)
    {
        $task->markAsCompleted();
        return redirect()->back();
    }
}
