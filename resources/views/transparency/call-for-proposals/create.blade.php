@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header clearfix">
                            <h3 class="card-title">Create Call for Proposals</h3>
                        </div>
                        <div class="card-body">
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

                                <div class="form-group">
                                    <label for="enddate">End Date</label>
                                    <input type="date" class="form-control" id="enddate" name="enddate">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                                </div>

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
        </div>
    </section>
</div>
@endsection
