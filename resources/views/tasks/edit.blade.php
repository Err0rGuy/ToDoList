@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0">Edit Task</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', $task) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $task->description) }}</textarea>
                            </div>

                            <div class="form-group form-check mb-3">
                                <input type="hidden" value="0" name="is_done">
                                <input type="checkbox" name="is_done" id="is_done" class="form-check-input" value="1" {{ old('is_done', $task->is_done) ? 'checked' : '' }}>
                                <label for="is_done" class="form-check-label">Mark as Done</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Update Task</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul  class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
