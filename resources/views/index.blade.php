@extends('layouts.app')

@section('content')
    <h1>Issues for Project: {{ $project->name }}</h1>
    <a href="{{ route('projects.issues.create', $project) }}">Create Issue</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td>{{ $issue->title }}</td>
                    <td>{{ $issue->description }}</td>
                    <td>{{ $issue->priority }}</td>
                    <td>{{ $issue->due_date }}</td>
                    <td>{{ $issue->status }}</td>
                    <td>
                        <a href="{{ route('projects.issues.edit', [$project, $issue]) }}">Edit</a>
                        <form action="{{ route('projects.issues.destroy', [$project, $issue]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
