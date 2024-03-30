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
                            @include('reports.report-options')
                        <div class="card-body">
                            <h3 class="card-title my-1"><i class="fa fa-book"></i> <b>Submitted Projects</b></h3> <br><br>




                        <!-- <div class="row">
                            {{-- START OF FILTER --}}
                            <div class="col-lg-3">
                                <label>Course:</label>
                                <select class="form-select" id="course" name="course">
                                    <option disabled selected>Select Course</option>

                                    <option value="">All</option>

                                    <option disabled>College of Arts and Science</option>
                                    <option value="ABE" {{ request('course') == 'ABE' ? 'selected' : '' }}>ABE</option>
                                    <option value="BSM" {{ request('course') == 'BSM' ? 'selected' : '' }}>BSM</option>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <label>Particular Request/s:</label>
                                <select class="form-select" id="particular_request" name="particular_request">
                                    <option disabled selected>Select a Request</option>

                                    <option value="">All</option>

                                    <option value="Official Transcript of Records"
                                        {{ request('particular_request') == 'Official Transcript of Records' ? 'selected' : '' }}>
                                        Official Transcript of Records</option>
                                </select>
                            </div> -->
                            <!-- {{-- END OF FILTER --}}
                            <div class="col-lg-3">
                                <label>Date:</label>
                                <input type="text" class="form-control" placeholder="Start" id="date1"
                                    autocomplete="off" />
                            </div>
                            <div class="col-lg-3">
                                <label>To</label>
                                <input type="text" class="form-control" placeholder="End" id="date2"
                                    autocomplete="off" />
                            </div>
                            <div class="col-lg-6 mt-4">
                                <label></label>
                                <button type="button" class="btn btn-primary" id="btn_search"><i
                                        class="fa fa-search"></i></button>
                                <button type="button" id="reset" class="btn btn-warning"><i
                                        class="fa fa-sync"></i></button>
                                <button type="button" id="generate_pdf" class="btn btn-success"><i
                                        class="fa fa-file-pdf"></i> Generate PDF</button>
                            </div>
                        </div> -->
                        <form action="{{ route('generate.projects.report') }}" method="post" id="exportForm">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Filter by:</label>
                                        <select class="form-control" name="filter_type" id="filter_type">
                                            <option>Select</option>
                                            <option value="year">Year</option>
                                            <option value="date">Date Range</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2" id="yearFilter">
                                    <div class="form-group">
                                        <label for="year">Year:</label>
                                        <select class="form-control" name="year" id="year">
                                                <option>Year</option>
                                            @for ($i = date('Y'); $i >= 2000; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4" id="dateFilter" style="display: none;">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="start_date">Start Date:</label>
                                            <input type="date" class="form-control" name="start_date" id="start_date">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="end_date">To:</label>
                                            <input type="date" class="form-control" name="end_date" id="end_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Actions</label>
                                        <div>
                                            <!-- <button type="button" class="btn btn-primary" id="btn_search"><i class="fa fa-search"></i> </button> -->
                                            <button type="button" id="reset" class="btn btn-warning"><i class="fa fa-sync"></i> </button>
                                            <button type="submit" class="btn btn-info"><i class="fa fa-file-pdf"></i> Generate PDF</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>





                            <table id="example1" class="table table-bordered table-hover text-center table-sm">
                                <thead>
                                    <tr>
                                        <th class="align-middle">#</th>
                                        <th class="align-middle">Tracking Code</th>
                                        <th class="align-middle">Call for Proposal</th>
                                        <th class="align-middle">Project Head</th>
                                        <th class="align-middle">Title</th>
                                        <th class="align-middle">Research Group</th>
                                        <th class="align-middle">Date Submitted</th>
                                        <th class="align-middle">Status</th>
                                        @if (Auth::user()->role == 1)
                                        <th class="align-middle">Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter = 0;
                                    @endphp
                                    @foreach ($projects as $record)
                                    @if (
                                    (in_array(auth()->user()->role, [1, 2, 4]) && $record->status !== 'Draft') ||
                                    $record->user_id === auth()->user()->id)
                                    @php
                                    $counter++;
                                    @endphp
                                    <tr class="clickable-row" data-href="{{ route('submission-details.show', $record->id) }}">
                                        <td class="align-middle">{{ $counter }}</td>
                                        <td class="align-middle">{{ $record->tracking_code }}</td>
                                        <td class="align-middle">
                                            @foreach ($call_for_proposals as $call_for_proposal)
                                            @if ($call_for_proposal->id === $record->call_for_proposal_id)
                                            {{ $call_for_proposal->title }}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="align-middle">{{ $record->user->name }}</td>
                                        <td class="align-middle">{{ $record->project_name }}</td>
                                        <td class="align-middle">{!! $record->research_group !!}</td>
                                        <td class="align-middle">{{ $record->created_at->format('F j, Y') }}
                                        </td>
                                        <td class="align-middle">

                                            @if ($record->status === 'Draft')
                                            <span class="badge badge-primary text-sm">Draft</span>
                                            @elseif ($record->status === 'Under Evaluation')
                                            <span class="badge badge-info text-sm">Under Evaluation</span>
                                            @elseif ($record->status === 'For Revision')
                                            <span class="badge badge-warning text-sm">For Revision</span>
                                            @elseif ($record->status === 'Deferred')
                                            <span class="badge badge-secondary text-sm">Deferred</span>
                                            @elseif ($record->status === 'Approved')
                                            <span class="badge badge-success text-sm">Approved</span>
                                            @elseif ($record->status === 'Disapproved')
                                            <span class="badge badge-danger text-sm">Disapproved</span>
                                            @endif

                                        </td>
                                        @if (Auth::user()->role == 1)
                                        <td class="align-middle">
                                            <div class="btn-group align-middle" role="group" aria-label="Basic example">
                                                    <button class="btn btn-danger"
                                                        onclick="confirmDelete('{{ route('projects.destroy', $record->id) }}')">
                                                        <i class="fas fa-trash"> </i>
                                                    </button>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="align-middle">#</th>
                                        <th class="align-middle">Tracking Code</th>
                                        <th class="align-middle">Call for Proposal</th>
                                        <th class="align-middle">Project Head</th>
                                        <th class="align-middle">Title</th>
                                        <th class="align-middle">Research Group</th>
                                        <th class="align-middle">Date Submitted</th>
                                        <th class="align-middle">Status</th>
                                        @if (Auth::user()->role == 1)
                                        <th class="align-middle">Actions</th>
                                        @endif
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


@if (session('success'))
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
