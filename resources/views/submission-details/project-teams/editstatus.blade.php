<form action="{{ route('projects.updateStatus', ['id' => $projects->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="Draft" @if($projects->status === 'Draft') selected @endif>Draft</option>
            <option value="Under Evaluation" @if($projects->status === 'Under Evaluation') selected @endif>Under Evaluation</option>
            <option value="For Revision" @if($projects->status === 'For Revision') selected @endif>For Revision</option>
            <option value="Approved" @if($projects->status === 'Approved') selected @endif>Approved</option>
            <option value="Deferred" @if($projects->status === 'Deferred') selected @endif>Deferred</option>
            <option value="Disapproved" @if($projects->status === 'Disapproved') selected @endif>Disapproved</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Status</button>
</form>