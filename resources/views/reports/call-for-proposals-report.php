<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Export</title>
    <link rel="stylesheet" type="text/css" href="css\report.css" />
</head>
<body>

    <img id="pdfLogo1" src="{{ public_path('dist/img/cspcLogo1.jpg') }}" alt="logo" style="max-width: 9.5%; margin: 0;">
    <img id="pdfLogo2" src="{{ public_path('dist/img/AIRCoDeLogo1.jpg') }}" alt="logo" style="max-width: 35%; margin: 0;">
    <div class="custom-paragraph">
        <p style="font-size: 10pt; font-family: 'Calibri', sans-serif;">Republic of the Philippines</p>
        <p style="font-size: 12pt; font-weight: bold; font-family: 'Calibri', sans-serif;">Camarines Sur Polytechnic Colleges</p>
        <p style="font-size: 10pt; font-family: 'Calibri', sans-serif;">Nabua, Camarines Sur</p>
    </div>
    <p style="font-size: 13pt; font-weight: bold; font-family: 'Calibri', sans-serif; margin-bottom: 1;">AI Research Center for Community Development</p>
    <img id="pdfLogo" src="{{ public_path('dist/img/headerLine.jpg') }}" alt="logo"style="width: 100%; margin: 0;">


    <div class="text-center">
        <br><header>CALL FOR PROPOSALS</header>
    </div>
    
    <table id="example1" class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <!-- <th>#</th> -->
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($call_for_proposals as $proposal)
            <!-- @if ((in_array(auth()->user()->role, [1, 2, 4]) && $record->status !== 'Draft') ||
                $record->user_id === auth()->user()->id) -->
                    <tr>
                        <!-- <td class="align-middle">{{ $counter }}</td> -->
                        <td class="align-middle">{{ $proposal->title }}</td>
                        <td class="align-middle">{{ $proposal->description }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($proposal->start_date)->format('F j, Y') }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($proposal->end_date)->format('F j, Y') }}</td>
                        <td class="align-middle">
                            @php
                                $currentDate = now();
                                $startDate = \Carbon\Carbon::parse($proposal->start_date);
                                $endDate = \Carbon\Carbon::parse($proposal->end_date);

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

                            <a href="{{ route('transparency.call-for-proposals.edit', $proposal->id) }}" type="button" class="btn btn-warning" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#editModal{{ $proposal->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                                    <div class="modal fade" id="editModal{{ $proposal->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $proposal->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModal{{ $proposal->id }}Label">Edit Call for Proposal</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="{{ route('transparency.call-for-proposals.edit', $proposal->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="title" class="float-left">Call for Proposals</label>
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Call for Proposals" value="{{$proposal->title}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="float-left">Description</label>
                                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{$proposal->description}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="start_date" class="float-left">Start Date</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{$proposal->start_date}}">
                                                </div>
                                                @error('start_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="end_date" class="float-left">End Date</label>
                                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{$proposal->end_date}}">
                                                </div>
                                                @error('end_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!-- <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="{{$proposal->status}}">
                                                </div> -->
                                                <div class="form-group">
                                                    <label for="remarks" class="float-left">Remarks</label>
                                                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks" value="{{$proposal->remarks}}">
                                                </div>
                                                <!-- <div class="form-group">
                                                    <button type="submit" class="btn btn-warning float-right">Update</button>
                                                </div> -->

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning btn-right">Update</button>
                                                </div>
                                            </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                            <button class="btn btn-danger" onclick="confirmDelete('{{ route('transparency.call-for-proposals.destroy', $proposal->id) }}')">
                                <i class="fas fa-trash"></i>
                            </button>
                            </div>
                        </td>
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
            </tr>
        </tfoot>
    </table>
    </div>

</body>

</html>
