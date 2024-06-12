<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        // $request->validated();
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0,
        ]);

        $request->session()->flash('alert-success', 'Task created successfully');

        return to_route('tasks.index');
    }

    // Display the specified task
    public function show($id)
    {
        $task = Task::find($id);
        if(! $task){
            request()->session()->flash('error', 'Unable to locate the Task');
            return to_route('tasks.index')->withErrors([
                'error' => "Unable to locate the Todo"
            ]);
        }
        return view('tasks.show', ['task' => $task]);
    }

    // Show the form for editing the specified task
    public function edit($id)
    {
        $task = Task::find($id);
        if(! $task){
            request()->session()->flash('error', 'Unable to locate the Task');
            return to_route('tasks.index')->withErrors([
                'error' => "Unable to locate the Todo"
            ]);
        }
        return view('tasks.edit', ['task' => $task]);
    }

    // Update the specified task in storage
    public function update(TaskRequest $request)
    {
        $task = Task::find($request->task_id);
        if(! $task){
            request()->session()->flash('error', 'Unable to locate the Task');
            return to_route('tasks.index')->withErrors([
                'error' => "Unable to locate the Todo"
            ]);
        }

        // dd($request->is_completed);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed
        ]);
        $request->session()->flash('alert-info', 'Task Update successfully');
        return to_route('tasks.index');
    }

    // Remove the specified task from storage
    public function destroy(Request $request)
    {
        $task = Task::find($request->task_id);
        if(! $task){
            request()->session()->flash('error', 'Unable to locate the Task');
            return to_route('tasks.index')->withErrors([
                'error' => "Unable to locate the Todo"
            ]);
        }

        $task->delete();
        $request->session()->flash('alert-success', 'Task Delete successfully');
        return to_route('tasks.index');
    }
}
