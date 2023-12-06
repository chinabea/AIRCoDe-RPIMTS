<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .header {
            text-align: center;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 11pt;
            color: black;
            margin-left: 0.5in;
            margin-right: 0.5in;
            margin-bottom: 0.3in;
        }

        h1,
        h2 {
            font-size: 12pt;
        }

        h3,
        p {
            font-size: 11pt;
            text-align: justify;
        }

        .tab {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .align-middle {
            vertical-align: middle;
        }

    </style>
</head>
<body>
    <img id="pdfLogo" src="{{ public_path('dist/img/header.jpg') }}" alt="logo" style="width:100%; margin:0;">
    <div>
        <div style="text-align: center;">
            <br>
            <h1>UNDER EVALUATION PROJECTS</h1>
        </div>
        <table id="example1" class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tracking Code</th>
                    <th>Call for Proposal</th>
                    <th>Title</th>
                    <th>Research Group</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
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
                      <td class="align-middle">
                        {{-- <a href="{{ route('submission-details.show', $project->id) }}"> --}}
                            {{ $project->project_name }}
                        {{-- </a> --}}
                      </td>
                      <td class="align-middle">{!! $project->research_group !!}</td>
                      <td class="align-middle">{{ $project->created_at->format('F j, Y') }}</td>
                      <td class="align-middle"><span class="badge badge-info text-sm">{{ $project->status }}</span></td>
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
                </tr>
            </tfoot>
        </table>
    </div>

</body>
</html>
