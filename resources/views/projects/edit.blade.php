
    <form action="{{ route('projects.storeReviewer') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="projname">Project Title</label>
            <input type="text" name="projname" id="projname" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="reviewers">Project Reviewers</label>
            <select name="reviewers[]" id="reviewers" class="form-control custom-select" multiple>
                <option disabled>Select reviewers</option>
                @foreach ($reviewers as $reviewer)
                    <option value="{{ $reviewer->id }}" data-project-id="{{ $reviewer->project_id }}">{{ $reviewer->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Project</button>
    </form>
