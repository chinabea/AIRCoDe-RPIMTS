

<div class="modal fade" id="lib" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Project Team</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="lineItemForm" method="post" action="{{ route('submission-details.line-items-budget.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="project_id" value="{{ $records->id }}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="unit_price">Unit Price</label>
                            <input type="number" class="form-control" id="unit_price" name="unit_price" required>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Member</button>
            </form>

            </div>
        </div>
    </div>
</div> 
