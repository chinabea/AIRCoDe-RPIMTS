<!-- resources/views/tasks/edit.blade.php
@extends('layouts.app')

@section('content')

<form action="/edittask/{{$task->id}}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
</div>
<div class="form-group">
    <label for="assigned_to">Assigned To</label>
    <select name="assigned_to" id="assigned_to" class="form-control" required>
        @foreach ($members as $member)
            <option value="{{ $member->id }}" {{ $member->id == $task->assigned_to ? 'selected' : '' }}>
                {{ $member->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $task->start_date ? $task->start_date->format('Y-m-d') : '' }}" required>
</div>
<div class="form-group">
    <label for="end_date">End Date</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $task->end_date ? $task->end_date->format('Y-m-d') : '' }}" required>
</div>

    <button type="submit" class="btn btn-primary">Update task</button>

</form>

@endsection
 -->
