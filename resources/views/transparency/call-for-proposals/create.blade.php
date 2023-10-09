
<div class="modal fade" id="CallforProposal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Call for Proposal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                            <form action="{{ route('transparency.call-for-proposals.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="proposaltitle">Proposal Title</label>
                                    <input type="text" class="form-control" id="proposaltitle" name="proposaltitle" placeholder="Title">
                                </div>

                                <div class="form-group">
                                    <label for="proposaldescription">Description</label>
                                    <input type="text" class="form-control" id="proposaldescription" name="proposaldescription" placeholder="Description">
                                </div>

                                <div class="form-group">
                                    <label for="startdate">Start Date</label>
                                    <input type="date" class="form-control" id="startdate" name="startdate">
                                </div>
                                @error('startdate')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="enddate">End Date</label>
                                    <input type="date" class="form-control" id="enddate" name="enddate">
                                </div>
                                @error('enddate')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                                </div>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
            </div>
        </div>
    </div>
</div> 



