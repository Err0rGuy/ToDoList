@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Task</h4>
                    </div><div class="card-body">
                        <form method="POST" action="{{ route('update', $task) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title ?? '') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $task->description ?? '') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Update Task</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-2">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
