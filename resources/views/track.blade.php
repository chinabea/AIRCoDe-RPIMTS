
@extends('layouts.template')
@section('title', 'Track')

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
                <h3>Track Submission Status</h3>
              </div>
              <div class="card-body">
              <div class="table-responsive">
                <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tracking ID</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ID" required>
                      <small id="emailHelp" class="form-text text-muted"> <b>Note:</b>
                        Your Tracking ID was sent to your registered email upon acknowledging receipt of your proposal.</small>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Search</button>
                  </form>
              </div>
            </div>

            <div class="card-footer clearfix">
            </div>


          </div>
        </div>
      </div>
    </section>
  </div>
  </div>


  @endsection
