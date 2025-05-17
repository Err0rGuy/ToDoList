@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Task Dashboard</h1><div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('dashboard') }}" class="form-inline">
                    <div class="form-group mr-3">
                        <label for="filter" class="mr-2">Filter by status:</label>
                        <select name="filter" id="filter" class="form-control">
                            <option value="">All</option>
                            <option value="done" {{ request('filter') == 'done' ? 'selected' : '' }}>Done</option>
                            <option value="undone" {{ request('filter') == 'undone' ? 'selected' : '' }}>Not Done</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Apply</button>
                    <a href="{{ route('tasks.create') }}" class="btn btn-success ml-3">Create New Task</a>
                </form>
            </div>
        </div>

        @if($tasks->count())
            <div class="row">
                @foreach($tasks as $task)
                    <div class="col-md-6 mb-4">
                        <div class="card {{ $task->is_done ? 'border-success' : 'border-warning' }} shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $task->title }}</h5>
                                <p class="card-text">{{ $task->description }}</p>
                                <span class="badge {{ $task->is_done ? 'badge-success' : 'badge-warning' }}">
                        {{ $task->is_done ? 'Completed' : 'Pending' }}
                    </span>
                                <div class="mt-3">
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $tasks->appends(request()->query())->links() }}
            </div>
        @else
            <div class="alert alert-info">No tasks found.</div>
        @endif

    </div>
@endsection
