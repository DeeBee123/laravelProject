@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light">
                    <div class="card-header">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('task.update', $task->id) }}" method="POST">
                                @csrf @method("PUT")
                                <div class="form-group">
                                    <label>Task name:</label>
                                    <input type="text" name="task_name" class="form-control"
                                        value="{{ $task->task_name }}">
                                </div>
                                <div class="form-group">
                                    <label>Task description:</label>
                                    <textarea type="text" name="task_description" id="mce" cols="30" rows="10"
                                        style="resize:none">{{ $task->task_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status:</label>
                                    <select name="status_id" id="" class="form-control">
                                        <option selected disabled>Select Status</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" @if ($status->id == $task->id) selected="selected" @endif>
                                                {{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date completed:</label>
                                    <input datetimeformat="yyyy-mm-dd" type="date" name="completed_date"
                                        class="form-control" value="{{ $task->completed_date }}">
                                </div>
                                <button type="submit" class="btn btn-dark">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
