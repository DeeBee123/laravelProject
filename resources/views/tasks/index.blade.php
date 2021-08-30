@extends('layouts.app')
@section('content')

<div class="card-body">
    <label>Select status:</label>
    <form class="form-inline" action="{{ route('task.index') }}" method="GET">
        <select name="status_id" id="" class="form-control">
            <option value="" selected>All</option>
            @foreach ($statuses as $status)
            <option value="{{ $status->id }}"
                @if($status->id == app('request')->input('status_id'))
                    selected="selected"
                @endif>{{ $status->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-dark">Filter</button>
    </form>
</div>
<div class="card-body table-responsive-sm">
    <table class="table table-hover table-light">
            <tr>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Status</th>
                <th>Date added</th>
                <th>Completed date</th>

            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task ->task_name }}</td>
                    <td>{!! $task->task_description !!}</td>
                    <td>{{ $task ->status->name}}</td>
                    <td>{{ $task ->add_date}}</td>
                    <td>{{ $task ->completed_date}}</td>
                    <td>
                        <form action={{ route('task.destroy', $task->id) }} method="POST">
                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-info">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('task.create') }}" class="btn btn-dark">Add</a>
        </div>
    </div>
@endsection
