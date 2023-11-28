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
        <br><header>DISAPPROVED</header>
    </div>

    <table id="example1" class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Tracking Code</th>
                <th>Call for Proposal</th>
                <th>Project Head</th>
                <th>Title</th>
                <th>Research Group</th>
                <th>Date Submitted</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if($records->count() > 0)
        @foreach($records as $index => $project)
                @if(auth()->user()->role == 1 || auth()->user()->role == 2 || $project->user_id === auth()->user()->id)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $project->tracking_code }}</td>
                    <td class="align-middle">
                        @foreach ($call_for_proposals as $call_for_proposal)
                            @if ($call_for_proposal->id === $project->call_for_proposal_id)
                                {{ $call_for_proposal->title }}
                            @endif
                        @endforeach
                    </td>
                    <td class="align-middle">{{ $project->user->name }}</td>
                    <td class="align-middle">
                    {{-- <a href="{{ route('submission-details.show', $project->id) }}"> --}}
                        {{ $project->project_name }}
                    {{-- </a> --}}
                    </td>
                    <td class="align-middle">{{ $project->research_group }}</td>
                    <td class="align-middle">{{ $project->created_at->format('F j, Y') }}</td>
                    <td class="align-middle"><span class="badge badge-success text-sm">{{ $project->status }}</span></td>
                </tr>
                @endif
                @endforeach
                @endif
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Tracking Code</th>
                <th>Call for Proposal</th>
                <th>Project Head</th>
                <th>Title</th>
                <th>Research Group</th>
                <th>Date Submitted</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>
    </div>

</body>

</html>
