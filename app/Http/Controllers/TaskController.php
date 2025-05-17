<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->filter;
        if ($filter === 'done')
            $tasks = Task::completed(true)->paginate(10)->appends(request()->query());
        elseif($filter === 'undone')
            $tasks = Task::completed(false)->paginate(10)->appends(request()->query());
        else
            $tasks = Task::query()->latest()->paginate(10);
        return view('dashboard', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50|unique:tasks',
            'description' => 'nullable|string'
        ]);
        Task::query()->create($request->all());

        return redirect()->route('dashboard')->with('success', "Task Created Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
           'title' => ['required', 'string', 'max:50', Rule::unique('tasks')->ignore($task->id)],
            'description' => 'nullable|string',
            'is_done' => 'boolean'
        ]);
        $task->fill($validated);
        if ($task->isDirty())
            $task->save();
        return redirect()->route('dashboard')->with('success', 'Task Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('dashboard')->with('success', 'Task Deleted Successfully!');
    }
}
