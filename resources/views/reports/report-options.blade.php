<div class="modal fade" id="usersPdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Report Options</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generate.users.report') }}" method="post">
                    @csrf

                    <label class="form-group" for="page_size">Page Size:</label>
                    <select class="form-control" name="page_size" id="page_size">
                        <option value="" disabled selected>Select Size</option>
                        <option value="letter">Letter</option>
                        <option value="a4">A4</option>
                        <option value="legal">Legal</option>
                    </select>

                    <label class="form-group" for="orientation">Orientation:</label>
                    <select class="form-control" name="orientation" id="orientation">
                        <option value="" disabled selected>Select Orientation</option>
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>

                    <!-- <label class="form-group" for="file_type">File Type:</label>
                    <select class="form-control" name="file_type" id="file_type">
                        <option value="" selected>Select Type</option>
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                        <option value="stream">Stream</option>
                    </select> -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-navy color-palette float-right"
                            style="background-color: #022A44;">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="projectsPdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Report Options</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generate.projects.report') }}" method="post">
                    @csrf

                    <label class="form-group" for="page_size">Page Size:</label>
                    <select class="form-control" name="page_size" id="page_size">
                        <option value="" disabled selected>Select Size</option>
                        <option value="letter">Letter</option>
                        <option value="a4">A4</option>
                        <option value="legal">Legal</option>
                    </select>

                    <label class="form-group" for="orientation">Orientation:</label>
                    <select class="form-control" name="orientation" id="orientation">
                        <option value="" disabled selected>Select Orientation</option>
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-navy color-palette float-right"
                            style="background-color: #022A44;">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="underEvaluationPdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Report Options</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generate.under-evaluation.report') }}" method="post">
                    @csrf

                    <label class="form-group" for="page_size">Page Size:</label>
                    <select class="form-control" name="page_size" id="page_size">
                        <option value="" disabled selected>Select Size</option>
                        <option value="letter">Letter</option>
                        <option value="a4">A4</option>
                        <option value="legal">Legal</option>
                    </select>

                    <label class="form-group" for="orientation">Orientation:</label>
                    <select class="form-control" name="orientation" id="orientation">
                        <option value="" disabled selected>Select Orientation</option>
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-navy color-palette float-right"
                            style="background-color: #022A44;">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="forRevisionPdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Report Options</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generate.for-revision.report') }}" method="post">
                    @csrf

                    <label class="form-group" for="page_size">Page Size:</label>
                    <select class="form-control" name="page_size" id="page_size">
                        <option value="" disabled selected>Select Size</option>
                        <option value="letter">Letter</option>
                        <option value="a4">A4</option>
                        <option value="legal">Legal</option>
                    </select>

                    <label class="form-group" for="orientation">Orientation:</label>
                    <select class="form-control" name="orientation" id="orientation">
                        <option value="" disabled selected>Select Orientation</option>
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-navy color-palette float-right"
                            style="background-color: #022A44;">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deferredPdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Report Options</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generate.deferred.report') }}" method="post">
                    @csrf

                    <label class="form-group" for="page_size">Page Size:</label>
                    <select class="form-control" name="page_size" id="page_size">
                        <option value="" disabled selected>Select Size</option>
                        <option value="letter">Letter</option>
                        <option value="a4">A4</option>
                        <option value="legal">Legal</option>
                    </select>

                    <label class="form-group" for="orientation">Orientation:</label>
                    <select class="form-control" name="orientation" id="orientation">
                        <option value="" disabled selected>Select Orientation</option>
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-navy color-palette float-right"
                            style="background-color: #022A44;">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="approvedPdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Report Options</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generate.approved.report') }}" method="post">
                    @csrf

                    <label class="form-group" for="page_size">Page Size:</label>
                    <select class="form-control" name="page_size" id="page_size">
                        <option value="" disabled selected>Select Size</option>
                        <option value="letter">Letter</option>
                        <option value="a4">A4</option>
                        <option value="legal">Legal</option>
                    </select>

                    <label class="form-group" for="orientation">Orientation:</label>
                    <select class="form-control" name="orientation" id="orientation">
                        <option value="" disabled selected>Select Orientation</option>
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-navy color-palette float-right"
                            style="background-color: #022A44;">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="disapprovedPdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Report Options</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('generate.disapproved.report') }}" method="post">
                    @csrf

                    <label class="form-group" for="page_size">Page Size:</label>
                    <select class="form-control" name="page_size" id="page_size">
                        <option value="" disabled selected>Select Size</option>
                        <option value="letter">Letter</option>
                        <option value="a4">A4</option>
                        <option value="legal">Legal</option>
                    </select>

                    <label class="form-group" for="orientation">Orientation:</label>
                    <select class="form-control" name="orientation" id="orientation">
                        <option value="" disabled selected>Select Orientation</option>
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-navy color-palette float-right"
                            style="background-color: #022A44;">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

