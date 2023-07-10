<!-- resources/views/schedules/edit.blade.php -->

<form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ $schedule->title }}" required>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control">{{ $schedule->description }}</textarea>
</div>
<div class="form-group">
    <label for="assigned_to">Assigned To</label>
    <select name="assigned_to" id="assigned_to" class="form-control" required>
        @foreach ($members as $member)
            <option value="{{ $member->id }}" {{ $member->id == $schedule->assigned_to ? 'selected' : '' }}>
                {{ $member->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $schedule->start_date ? $schedule->start_date->format('Y-m-d') : '' }}" required>
</div>
<div class="form-group">
    <label for="end_date">End Date</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $schedule->end_date ? $schedule->end_date->format('Y-m-d') : '' }}" required>
</div>

    <!-- Include other form fields as needed -->

    <button type="submit" class="btn btn-primary">Update Schedule</button>
    <!-- <a href="/schedules/{{ $schedule->id }}/edit">Edit Schedule</a> -->

</form>



<!-- resources/views/schedules/edit.blade.php -->

<!-- <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ $schedule->title }}" required>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control">{{ $schedule->description }}</textarea>
</div>
<div class="form-group">
    <label for="assigned_to">Assigned To</label>
    <select name="assigned_to" id="assigned_to" class="form-control" required>
        @foreach ($members as $member)
            <option value="{{ $member->id }}" {{ $member->id == $schedule->assigned_to ? 'selected' : '' }}>
                {{ $member->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $schedule->start_date ? $schedule->start_date->format('Y-m-d') : '' }}" required>
</div>
<div class="form-group">
    <label for="end_date">End Date</label>
    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $schedule->end_date ? $schedule->end_date->format('Y-m-d') : '' }}" required>
</div>
<button type="submit" class="btn btn-primary">Update Schedule</button> -->
