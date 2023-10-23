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

                <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#CallforProposal" data-backdrop="static" data-keyboard="false">
                  <i class="fas fa-plus"></i> Add Call for Proposals</button>
                @include('transparency.call-for-proposals.create')

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
                          <td class="align-middle">{{ \Carbon\Carbon::parse($proposal->startdate)->format('F j, Y') }}</td>
                          <td class="align-middle">{{ \Carbon\Carbon::parse($proposal->enddate)->format('F j, Y') }}</td>
                          <td class="align-middle">
                            @php
                                $currentDate = now();
                                $startDate = \Carbon\Carbon::parse($proposal->startdate);
                                $endDate = \Carbon\Carbon::parse($proposal->enddate);

                                if ($currentDate >= $startDate && $currentDate <= $endDate) {
                                    echo 'Open';
                                } elseif ($currentDate < $startDate) {
                                    echo 'Opening Soon';
                                } else {
                                    echo 'Closed';
                                }
                            @endphp
                          </td>
                          <td class="align-middle">{{ $proposal->remarks }}</td>
                          <td class="align-middle">
                              <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                              <!-- <a href="{{ route('transparency.call-for-proposals.show', $proposal->id) }}" type="button" class="btn btn-secondary">
                                <i class="fas fa-info-circle"></i> 
                              </a> -->

                              <a href="{{ route('transparency.call-for-proposals.edit', $proposal->id) }}" type="button" class="btn btn-warning">
                                <i class="fas fa-edit"></i> 
                              </a>

                              <button class="btn btn-danger" onclick="confirmDelete('{{ route('transparency.call-for-proposals.destroy', $proposal->id) }}')">
                                <i class="fas fa-trash"></i> 
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
              </table>
            @if(session('success'))
                <script>
                    toastr.success('{{ session('success') }}');
                </script>
            @elseif(session('delete'))
                <script>
                    toastr.delete('{{ session('delete') }}');
                </script>
            @elseif(session('message'))
                <script>
                    toastr.message('{{ session('message') }}');
                </script>
            @elseif(session('error'))
                <script>
                    toastr.error('{{ session('error') }}');
                </script>
            @endif
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
