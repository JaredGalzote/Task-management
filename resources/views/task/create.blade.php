@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Add task</h1>
    <hr />
    <form action="{{ route('task.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="control-label" for="due_date">Date</label>
                <input class="form-control" type="date"  name="due_date" placeholder="MM/DD/YYY" type="text" />
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
