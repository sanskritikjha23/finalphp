<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($projectId)
{
    $tasks = Task::where('project_id', $projectId)->get();
    return view('tasks.index', compact('tasks'));
}

public function create($projectId)
{
    return view('tasks.create', compact('projectId'));
}

public function store(Request $request, $projectId)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'status' => 'in:Open,In Progress,Closed',
        'due_date' => 'nullable|date',
    ]);

    Task::create([
        'project_id' => $projectId,
        'title' => $request->title,
        'description' => $request->description,
        'status' => $request->status,
        'due_date' => $request->due_date,
    ]);

    return redirect()->route('projects.tasks.index', $projectId);
}

public function edit($projectId, $id)
{
    $task = Task::findOrFail($id);
    return view('tasks.edit', compact('task', 'projectId'));
}

public function update(Request $request, $projectId, $id)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'status' => 'in:Open,In Progress,Closed',
        'due_date' => 'nullable|date',
    ]);

    $task = Task::findOrFail($id);
    $task->update($request->all());

    return redirect()->route('projects.tasks.index', $projectId);
}

public function destroy($projectId, $id)
{
    $task = Task::findOrFail($id);
    $task->delete();

    return redirect()->route('projects.tasks.index', $projectId);
}
}
