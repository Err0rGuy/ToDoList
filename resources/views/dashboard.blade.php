@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4 fw-bold">Task Dashboard</h1>

        <div class="card mb-4 shadow-lg">
            <div class="card-body">
                <form method="GET" action="{{ route('dashboard') }}" class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="filter" class="col-form-label">Status:</label>
                    </div>
                    <div class="col-auto">
                        <select name="filter" id="filter" class="form-select">
                            <option value="">All</option>
                            <option value="done" {{ request('filter') == 'done' ? 'selected' : '' }}>Done</option>
                            <option value="undone" {{ request('filter') == 'undone' ? 'selected' : '' }}>Not Done
                            </option>
                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="sort_by" class="col-form-label">Sort by:</label>
                    </div>
                    <div class="col-auto">
                        <select name="sort_by" id="sort_by" class="form-select">
                            <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>
                                Created Date
                            </option>
                            <option value="updated_at" {{ request('sort_by') == 'updated_at' ? 'selected' : '' }}>
                                Updated Date
                            </option>

                            <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Title</option>
                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="order" class="col-form-label">Order:</label>
                    </div>
                    <div class="col-auto">
                        <select name="order" id="order" class="form-select">
                            <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>

                    <div class="col-auto ms-auto">
                        <a href="{{ route('tasks.create') }}" class="btn btn-success">+ New Task</a>
                    </div>
                    <div class="col-auto">
                        <label class="col-form-label">Number of tasks: {{ $count }}</label>
                    </div>

                </form>

            </div>
        </div>

        @if($tasks->count())
            @foreach($tasks as $task)
                <div
                    class="card mb-3 shadow-lg border-start border-5 {{ $task->is_done ? 'border-success' : 'border-warning' }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0 text-dark fw-bold">{{ $task->title }}</h5>
                            <span class="badge {{ $task->is_done ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $task->is_done ? 'Completed' : 'Pending' }}
                            </span>
                        </div>
                        <p class="text-muted mb-3">{{ $task->description }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-info">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                  onsubmit="return confirm('Delete this task?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

{{--            @if($tasks->hasMorePages())--}}
{{--                <div class="d-flex justify-content-center mt-4">--}}
{{--                    <a href="{{ $tasks->nextPageUrl() }}{{ request()->getQueryString() ? '&' . request()->getQueryString() : '' }}"--}}
{{--                       class="btn btn-outline-info">Load More</a>--}}
{{--                </div>--}}
{{--            @endif--}}

                            <div class="d-flex justify-content-center mt-4">
                                {{ $tasks->links() }}
                            </div>
        @else
            <div class="alert alert-info text-center">No tasks found.</div>
        @endif

    </div>

@endsection


