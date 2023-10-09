
<div class="modal fade" id="AccessRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Access Request</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transparency.access-requests.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <br>
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                      <option value="">Select</option>
                      <option value="Researcher">Researcher</option>
                      <option value="Student">Student</option>
                      <option value="Reviewer">Reviewer</option>
                    </select>
                    <br>
                    <label for="inputText">Date of access</label>
                    <input type="date" class="form-control"  id="dateofaccess" name="dateofaccess" placeholder="Date of access" required>
                    <br>
                    @error('dateofaccess')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <label for="inputText">Time of access</label>
                    <input type="time" class="form-control"  id="timeofaccess" name="timeofaccess" placeholder="Time of access" required>
                    <br>
                    @error('timeofaccess')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                          
                    <label for="">Purpose of Access</label>
                    <input type="text" class="form-control" id="purposeofaccess" name="purposeofaccess" required>
                    <br>
                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                    <label for="date">Date Approved</label>
                    <input type="date" class="form-control" id="dateapproved" name="dateapproved">
                    <br>
                    @error('dateapproved')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> 


