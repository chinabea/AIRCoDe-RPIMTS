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
                <h3 class="card-title text-center">Call for Proposals</h3>
              </div>
              <div class="card-body">
              <div class="table-responsive">
                <a href="{{ route('transparency.call-for-proposals.create') }}" class="btn btn-primary my-2">
                <i class="fas fa-plus"></i> Add Proposals</a>

                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-hover text-center table-sm">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Proposal Title</th>
                          <th>Proposal Description</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Status</th>
                          <th>Remarks</th>
                          <th>Action(s)</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if($records->count() > 0)
                      @foreach($records as $proposal)
                      <tr>
                          <td class="align-middle">{{ $loop->iteration }}</td>
                          <td class="align-middle">{{ $proposal->proposaltitle }}</td>
                          <td class="align-middle">{{ $proposal->proposaldescription }}</td>
                          <td class="align-middle">{{ $proposal->startdate }}</td>
                          <td class="align-middle">{{ $proposal->enddate }}</td>
                          <td class="align-middle">{{ $proposal->status }}</td>
                          <td class="align-middle">{{ $proposal->remarks }}</td>
                          <td class="align-middle">
                              <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                              <a href="{{ route('transparency.call-for-proposals.show', $proposal->id) }}" type="button" class="btn btn-secondary">
                                <i class="fas fa-info-circle"></i> Details
                              </a>

                              <a href="{{ route('transparency.call-for-proposals.edit', $proposal->id) }}" type="button" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                              </a>

                              <button class="btn btn-danger" onclick="confirmDelete('{{ route('transparency.call-for-proposals.destroy', $proposal->id) }}')">
                                <i class="fas fa-trash"></i> Delete
                              </button>


                                  <script>
                                      function confirmDelete(url) {
                                          if (confirm('Delete?')) {
                                              // Create a hidden form and submit it programmatically
                                              var form = document.createElement('form');
                                              form.action = url;
                                              form.method = 'POST';
                                              form.innerHTML = '@csrf @method("delete")';
                                              document.body.appendChild(form);
                                              form.submit();
                                          }
                                      }
                                  </script>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                      @endif
                  </tbody>
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Proposal Title</th>
                          <th>Proposal Description</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Status</th>
                          <th>Remarks</th>
                          <th>Action(s)</th>
                      </tr>
                  </thead>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>


  @endsection
