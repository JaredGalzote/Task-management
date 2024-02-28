@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Task List </h1>
        <a href="{{ route('task.create') }}" class="btn btn-primary">Add Task</a>
    </div>
    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Due date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @if ($task->count() > 0)
                @foreach ($task as $rs)
                    <tr>
                        <td class="align-middle">{{ $rs->title }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>
                        <td class="align-middle">{{ $rs->due_date }}</td>
                        <td class="align-middle">
                            <form action="{{ route('task.updateStatus', $rs->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="status"
                                        onchange="this.form.submit()" {{ $rs->status ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        {{ $rs->statusDisplay }}
                                    </label>
                                </div>
                            </form>
                        </td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('task.show', $rs->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('task.edit', $rs->id) }}" type="button" class="btn btn-primary"
                                    onclick="return confirm('Are you sure you want to edit this task?')">Edit</a>
                                <form action="{{ route('task.destroy', $rs->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">No Task Available</td>
                </tr>
            @endif

        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        {{ $task->links() }}
    </nav>
@endsection
