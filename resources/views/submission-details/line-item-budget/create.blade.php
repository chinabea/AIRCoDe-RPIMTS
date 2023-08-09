<div class="modal fade" id="LIB" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Line-Item Budget</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('submission-details.line-item-budget.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Project ID</label>
                            <input type="text" class="form-control" id="" name="" value="{{ $records->id }}" disabled>
                        </div>
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
                    <button type="submit" class="btn btn-primary">Add Line-Item</button>
                </form>
            </div>
        </div>
    </div>
</div> 

