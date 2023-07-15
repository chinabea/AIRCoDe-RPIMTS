<form action="{{ route('proponents.projects.storeReviewer') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="reviewers">Project Reviewers</label>
        <select name="reviewers[]" id="reviewers" class="form-control custom-select" required>
            <option disabled>Select reviewers</option>
            @foreach ($reviewers as $reviewer)
                <option value="{{ $reviewer->id }}">{{ $reviewer->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Project</button>
</form>
