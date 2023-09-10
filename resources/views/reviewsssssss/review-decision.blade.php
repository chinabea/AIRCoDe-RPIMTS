@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>
    <div class="col-md-12 ">
            <div class="card card-primary card-outline">
              <div class="card-header">
                  SUBMISSION DETAILS
              </div>
              <div class="card-body pad table-responsive">
                <table class="table table-bordered table-sm text-right">
                    <tbody>
                        <tr>
                        <th scope="row" width="25%">PROJECT ID</th>
                        <td class="text-left">{{ $records->id }}</td>
                        </tr>
                        <tr>
                        <th scope="row" width="25%">PROJECT TITLE</th>
                        <td class="text-left">{{ $records->projname }}</td>
                        </tr>
                        <tr>
                        <th scope="row">PROJECT LEADER</th>
                        <td class="text-left">{{ $records->user->name }}
                            <a href="{{ route('emailbox.compose') }}" class="btn btn-default btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Send Email">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">STATUS</th>
                        <td class="text-left">{{ $records->status }}</td>
                        </tr>
                        <tr>
                        <th scope="row">DATE SUBMITTED</th>
                        <td class="text-left">{{ ($records->created_at) }}</td>
                        </tr>
                        <tr>
                        <th scope="row">LAST UPDATE</th>
                        <td class="text-left">{{ ($records->updated_at) }}</td>
                        </tr>

                    </tbody>
                </table>
              </div>
            </div>
          </div>

        <div class="col-lg-12">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Review Decision</h6>
                </div>
                <div class="card-body">
                    <h3>{{ $records->projname }}</h3>
                    <p>comments</p>
                </div>
            </div>

        </div>

        <div class="text-center">
            <form action="{{ route('reviews.review-decision.store', ['id' => $records->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <!-- Other form fields... -->
                <input type="hidden" name="project_id" value="{{ $records->id }}">

                <button value="Accepted" type="submit" name="decision" class="btn btn-info">
                    <i class="fas fa-check-circle mr-2"></i>Accepted
                </button>
                <button value="Accepted with Revision" type="submit" name="decision" class="btn btn-warning">
                    <i class="fas fa-edit mr-2"></i>Accepted with Revision
                </button>
                <button value="Rejected" type="submit" name="decision" class="btn btn-danger">
                    <i class="fas fa-times-circle mr-2"></i>Rejected
                </button>
            </form>
        </div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="{{ asset('submissiondetailbuttons.js') }}"></script>

</div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>


@endsection
