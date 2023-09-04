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
                <div class="card-header">
                  <h3 class="card-title">Access Requests</h3>
                </div>
                <div class="card-body"> 
                <form action="{{ route('transparency.access-requests.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <br>
                    <label for="inputText">Role</label>
                    <input type="text" class="form-control"  id="role" name="role"  placeholder="Role">
                    <br>
                    <label for="inputText">Date and Time of access</label>
                    <input type="date" class="form-control"  id="dateandtimeofaccess" name="dateandtimeofaccess"  placeholder="Date and Time of access">
                    <br>
                    <label for="">Purpose of Access</label>
                    <input type="TEXT" class="form-control" id="purposeofaccess" name="purposeofaccess">
                    <br>
                    <label for="date">Date Approved</label>
                    <input type="date" class="form-control" id="dateapproved" name="dateapproved">
                    <br>
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






























