
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
                    <label for="role">Name</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                    <br>
                    <label for="role">Role</label>
                    <input type="text" class="form-control" value="@if(auth()->user()->role == 1)Director
                    @elseif(auth()->user()->role == 2)Staff
                    @elseif(auth()->user()->role == 3)Researcher
                    @elseif(auth()->user()->role == 4)Reviewer
                    @endif" readonly>
                    <label for="inputText">Date of access</label>
                    <input type="date" class="form-control"  id="date_of_access" name="date_of_access" placeholder="Date of access" required>
                    <br>
                    @error('date_of_access')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <label for="inputText">Time of access</label>
                    <input type="time" class="form-control"  id="time_of_access" name="time_of_access" placeholder="Time of access" required>
                    <br>
                    @error('time_of_access')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                          
                    <label for="">Purpose of Access</label>
                    <input type="text" class="form-control" id="purpose_of_access" name="purpose_of_access" required>
                    <br>
                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                    <label for="date">Date Approved</label>
                    <input type="date" class="form-control" id="date_approved" name="date_approved">
                    <br>
                    @error('date_approved')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @endif

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info btn-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


