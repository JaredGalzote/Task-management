@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit task</h1>
    <hr />
    <form action="{{ route('task.update', $task->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $task->title }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description">{{ $task->description }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="control-label" for="due_date">Date</label>
                <input class="form-control" type="date"  name="due_date" type="text" value="{{ $task->due_date }}"/> 
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
