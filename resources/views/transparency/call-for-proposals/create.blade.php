@extends('layouts.template')
@section('title', 'Create Call for Proposals')

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
                <!-- <h3 class="text-center">Create Call for Proposals</h3>  -->
                <form action="{{ route('transparency.call-for-proposals.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <br>
                    <label for="inputText">Proposal Title</label>
                    <input type="text" class="form-control"  id="proposaltitle" name="proposaltitle"  placeholder="Title">
                    <br>
                    <label for="inputText">Description</label>
                    <input type="text" class="form-control"  id="proposaldescription" name="proposaldescription"  placeholder="Description">
                    <br>
                    <label for="date">Start Date</label>
                    <input type="date" class="form-control" id="startdate" name="startdate">
                    <br>
                    <label for="date">End Date</label>
                    <input type="date" class="form-control" id="enddate" name="enddate">
                    <br>
                    <label for="inputText">Status</label>
                    <input type="text" class="form-control"  id="status" name="status"  placeholder="Status">
                    <br>
                    <label for="inputText">Remarks</label>
                    <input type="text" class="form-control"  id="remarks" name="remarks"  placeholder="Remarks">
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
  </div>


  @endsection






























