@extends('layouts.template')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <!-- Header Content Goes Here -->
    </section>

    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h3 class="card-title">{{ $proposals->proposaltitle }}</h3>
            </div>
            <div class="card-body">
              <p class="card-text">{{ $proposals->proposaldescription }}</p>
              <div class="mb-4">
                <strong>Start Date:</strong> {{ $proposals->startdate }}
              </div>
              <div class="mb-4">
                <strong>End Date:</strong> {{ $proposals->enddate }}
              </div>
              <div class="mb-4">
                <strong>Status:</strong> {{ $proposals->status }}
              </div>
              <div class="mb-4">
                <strong>Remarks:</strong> {{ $proposals->remarks }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header bg-secondary text-white">
              <h3 class="card-title">Additional Information</h3>
            </div>
            <div class="card-body">
              <div class="mb-4">
                <strong>Created At:</strong> {{ $proposals->created_at }}
              </div>
              <div class="mb-4">
                <strong>Updated At:</strong> {{ $proposals->updated_at }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
