@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <!-- Add content header elements here if needed -->
    </section>

    <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Access Requests</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <!-- Input fields for displaying data -->
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" class="form-control" value="{{ $accessrequests->role }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dateandtimeofaccess">Date and Time of Access</label>
                        <input type="text" name="dateandtimeofaccess" class="form-control" value="{{ $accessrequests->dateandtimeofaccess }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="startdate">Purpose of Access</label>
                        <input type="text" name="startdate" class="form-control" value="{{ $accessrequests->purposeofaccess }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="enddate">Date Approved</label>
                        <input type="text" name="enddate" class="form-control" value="{{ $accessrequests->dateapproved }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Created At</label>
                        <input type="text" name="created_at" class="form-control" value="{{ $accessrequests->created_at }}" readonly>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Updated At</label>
                        <input type="text" name="updated_at" class="form-control" value="{{ $accessrequests->updated_at }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
