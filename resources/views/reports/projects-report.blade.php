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
        <br><header>SUBMITTED PROJECTS</header>
    </div>
    
    <table id="example1" class="table table-bordered table-hover text-center">
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
            </tr>
        </thead>
        <tbody>
            
            @foreach ($records as $record)
                @if (
                    (in_array(auth()->user()->role, [1, 2, 4]) && $record->status !== 'Draft') ||q
                        $record->user_id === auth()->user()->id)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $record->tracking_code }}</td>
                        <td class="align-middle">
                            @foreach ($call_for_proposals as $call_for_proposal)
                                @if ($call_for_proposal->id === $record->call_for_proposal_id)
                                    {{ $call_for_proposal->title }}
                                @endif
                            @endforeach
                        </td>
                        <td class="align-middle">{{ $record->user->name }}</td>
                        <td class="align-middle">
                            <!-- <a href="{{ route('submission-details.show', $record->id) }}"> -->
                            {{ $record->project_name }}
                            <!-- </a> -->
                        </td>
                        <td class="align-middle">{!! $record->research_group !!}</td>
                        <td class="align-middle">{{ $record->created_at->format('F j, Y') }}</td>
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
