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
            <h1>USERS</h1>
        </div>
        <table id="example1" class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @if ($records->count() > 0)
                    @foreach ($records as $user)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">
                                @if ($user->role == 1)
                                    Director
                                @elseif ($user->role == 2)
                                    Staff
                                @elseif ($user->role == 3)
                                    Researcher
                                @elseif ($user->role == 4)
                                    Reviewer
                                @else
                                    Guest
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

</body>

</html>
