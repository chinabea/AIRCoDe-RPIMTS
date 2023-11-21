
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Report</title>
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
            /* margin-left: 2em; Adjust the value as needed */
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
            <h1>{{ $data->project_name }}</h1>
            <br>
        </div>
        <h2>Status</h2>
        <p>{{ $data->status }}</p>
        <br>

        <h2>Research Group</h2>
        <p>{{ $data->research_group }}</p>
        <br>

        <h2>Author(s):</h2>
        {{ $data->authors }}
        <p>{{ $data->user->name }}</p>
        @foreach ($projMembers as $member)
            <p>{{ $member->member_name }}</p>
        @endforeach
        <br>

        <h2>Introduction</h2>
        <p>{!! $data->introduction !!}</p>
        <br>

        <h2>Aims and Objectives</h2>
        <p>{!! $data->aims_and_objectives !!}</p>
        <br>

        <h2>Background</h2>
        <p>{!! $data->background !!}</p>
        <br>

        <h2>Expected Research Contribution</h2>
        <p>{!! $data->expected_research_contribution !!}</p>
        <br>

        <h2>The Proposed Methodology</h2>
        <p>{!! $data->proposed_methodology !!}</p>
        <br>

        <h2>Work Plan</h2>
        <p>{!! $data->workplan !!}</p>
        <br>

        <h2>Resources</h2>
        <p>{!! $data->resources !!}</p>
        <br>

        <h2>References</h2>
        <p>{!! $data->references !!}</p>
        <br>

    </div>

</body>
</html>
