

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
                            <h3 class="card-title my-1"><i class="fa fa-book"></i> Under Evaluation</h3>
                            
                            <!-- <button type="button" class="btn bg-navy color-palette float-right btn-sm" data-toggle="modal" data-target="#underEvaluationPdf" data-backdrop="static" data-keyboard="false"> 
                                    <i class="fas fa-file-pdf"></i> Export to PDF</button>  -->
                                    @include('reports.report-options')
                        </div>
                        <div class="card-body">
                        <form action="{{ route('generate.under-evaluation.report') }}" method="post">
    @csrf

    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date" required>

    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" required>

    <button type="button" class="btn bg-navy color-palette float-right btn-sm" data-toggle="modal" data-target="#underEvaluationPdfModal" data-backdrop="static" data-keyboard="false"> 
        <i class="fas fa-file-pdf"></i> Export to PDF
    </button>

    <br>

    <!-- Hidden inputs for selected date range -->
    <input type="hidden" name="selected_start_date" id="selectedStartDate">
    <input type="hidden" name="selected_end_date" id="selectedEndDate">

    <!-- Modal -->
    <div class="modal fade" id="underEvaluationPdfModal" tabindex="-1" role="dialog" aria-labelledby="underEvaluationPdfLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal content goes here -->

                <!-- Modal header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="underEvaluationPdfLabel">Report Options</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('generate.under-evaluation.report') }}" method="post">
                        @csrf

                        <label class="form-group" for="page_size">Page Size:</label>
                        <select class="form-control" name="page_size" id="page_size">
                            <option value="" disabled selected>Select Size</option>
                            <option value="letter">Letter</option>
                            <option value="a4">A4</option>
                            <option value="legal">Legal</option>
                        </select>

                        <label class="form-group" for="orientation">Orientation:</label>
                        <select class="form-control" name="orientation" id="orientation">
                            <option value="" disabled selected>Select Orientation</option>
                            <option value="portrait">Portrait</option>
                            <option value="landscape">Landscape</option>
                        </select>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-navy color-palette float-right" style="background-color: #022A44;">
                                <i class="fas fa-file-pdf"></i> Export to PDF
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>


                            <table id="example1" class="table table-bordered table-hover text-center table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tracking Code</th>
                                        <th>Call for Proposal</th>
                                        <th>Title</th>
                                        <th>Research Group</th>
                                        <th>Date Submitted</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @foreach($projects as $index => $project)
                                      @if(auth()->user()->role == 1 || auth()->user()->role == 2 || $project->user_id === auth()->user()->id)
                                            @php
                                                $counter++;
                                            @endphp
                                      <tr>
                                          <td class="align-middle">{{ $counter }}</td>
                                          <td class="align-middle">{{ $project->tracking_code }}</td>
                                          <td class="align-middle">
                                                @foreach ($call_for_proposals as $call_for_proposal)
                                                    @if ($call_for_proposal->id === $project->call_for_proposal_id)
                                                        {{ $call_for_proposal->title }}
                                                    @endif
                                                @endforeach
                                          </td>
                                          <td class="align-middle">
                                            {{-- <a href="{{ route('submission-details.show', $project->id) }}"> --}}
                                                {{ $project->project_name }}
                                            {{-- </a> --}}
                                          </td>
                                          <td class="align-middle">{!! $project->research_group !!}</td>
                                          <td class="align-middle">{{ $project->created_at->format('F j, Y') }}</td>
                                          <td class="align-middle"><span class="badge badge-info text-sm">{{ $project->status }}</span></td>
                                          <td class="align-middle">
                                              <div class="btn-group align-middle" role="group" aria-label="Basic example">
                                              <a href="{{ route('submission-details.show', $project->id) }}" type="button" class="btn btn-secondary">
                                              <i class="fas fa-info-circle"></i>
                                              </a>
                                              <a href="{{ route('projects.edit', $project->id) }}" type="button" class="btn btn-warning">
                                              <i class="fas fa-edit"></i>
                                              </a>

                                              <button class="btn btn-danger" onclick="confirmDelete('{{ route('projects.destroy', $project->id) }}')">
                                              <i class="fas fa-trash"></i>
                                              </button>
                                          </td>
                                      </tr>
                                      @endif
                                      @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Tracking Code</th>
                                        <th>Call for Proposal</th>
                                        <th>Title</th>
                                        <th>Research Group</th>
                                        <th>Date Submitted</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


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

@endsection

