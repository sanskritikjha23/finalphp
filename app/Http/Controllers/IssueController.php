<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Show all issues for a specific project
    public function index(Project $project) {
        $issues = $project->issues; // Assuming you have a relationship defined
        return view('issues.index', compact('issues', 'project'));
    }

    // Show form to create a new issue
    public function create(Project $project) {
        return view('issues.create', compact('project'));
    }

    // Store a new issue
    public function store(Request $request, Project $project) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|string',
            'due_date' => 'nullable|date',
            'status' => 'required|string',
        ]);

        $issue = new Issue($validatedData);
        $issue->project_id = $project->id;
        $issue->save();

        return redirect()->route('projects.issues.index', $project)->with('success', 'Issue created successfully.');
    }

    // Show form to edit an existing issue
    public function edit(Issue $issue) {
        return view('issues.edit', compact('issue'));
    }

    // Update an existing issue
    public function update(Request $request, Issue $issue) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|string',
            'due_date' => 'nullable|date',
            'status' => 'required|string',
        ]);

        $issue->update($validatedData);
        return redirect()->route('projects.issues.index', $issue->project)->with('success', 'Issue updated successfully.');
    }

    // Delete an issue
    public function destroy(Issue $issue) {
        $issue->delete();
        return redirect()->route('projects.issues.index', $issue->project)->with('success', 'Issue deleted successfully.');
    }
}
