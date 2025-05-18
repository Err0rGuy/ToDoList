<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function Laravel\Prompts\alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::query();
        $filter = $request->get('filter');
        $sort_by = $request->get('sort_by', 'created_at');
        $order = $request->get('order', 'desc');
        if ($filter === 'done')
            $query->completed(true);
        elseif($filter === 'undone')
            $query->completed(false);
        $tasks = $query->orderBy($sort_by, $order)->simplePaginate(10)->appends($request->query());
        $count = $query->count();
        return view('dashboard', compact(['tasks', 'count']));
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
        $validated = $request->validate([
            'title' => 'required|string|max:50|unique:tasks',
            'description' => 'nullable|string'
        ]);
        Task::query()->create($validated);

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
