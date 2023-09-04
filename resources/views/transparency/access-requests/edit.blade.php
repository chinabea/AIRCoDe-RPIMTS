@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Access Requests</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Access Request</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('transparency.access-requests.edit', $accessrequests->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" class="form-control" id="role" name="role" value="{{ $accessrequests->role }}">
                                </div>

                                <div class="form-group">
                                    <label for="dateandtimeofaccess">Date and Time of Access</label>
                                    <input type="date" class="form-control" id="dateandtimeofaccess" name="dateandtimeofaccess" value="{{ $accessrequests->dateandtimeofaccess }}">
                                </div>

                                <div class="form-group">
                                    <label for="purposeofaccess">Purpose of Access</label>
                                    <input type="text" class="form-control" id="purposeofaccess" name="purposeofaccess" value="{{ $accessrequests->purposeofaccess }}">
                                </div>

                                <div class="form-group">
                                    <label for="dateapproved">Date Approved</label>
                                    <input type="date" class="form-control" id="dateapproved" name="dateapproved" value="{{ $accessrequests->dateapproved }}">
                                </div>

                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
