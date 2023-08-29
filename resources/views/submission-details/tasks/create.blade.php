

<div class="modal fade" id="Tasks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('submission-details.tasks.store', ['id' => $records->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <input type="hidden" name="project_id" value="{{ $records->id }}">
                  <div class="form-group">
                      <label for="title">Task Title</label>
                      <input type="text" name="title" id="title" class="form-control" required>
                  </div>

                  <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                  </div>

                  <div class="form-group">
                      <label for="start_date">Start Date</label>
                      <input type="date" name="start_date" id="start_date" class="form-control" required>
                  </div>

                  <div class="form-group">
                      <label for="end_date">End Date</label>
                      <input type="date" name="end_date" id="end_date" class="form-control" required>
                  </div>

                  <div class="form-group">
                      <label for="assigned_to">Assigned To</label>
                      <select name="assigned_to" id="assigned_to" class="form-control" required>
                          @foreach ($members as $member)
                              <option value="{{ $member->id }}">{{ $member->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Add Task</button>
              </form>
            </div>
        </div>
    </div>
</div> 


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>