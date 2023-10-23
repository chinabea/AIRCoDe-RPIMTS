<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call for Proposals</title>

    <link rel="icon" type="image/png" href="{{ asset('dist/img/systemAIRCoDeLogo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-center align-items-center">
            <i class="fas fa-tasks fa-2x text-gray-300"></i>
            <h1 class="m-0 ml-3 font-weight-bold">CALL FOR PROPOSALS</h1>
        </div>
        <div class="card-body">
            
        <div class="table-responsive">
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
                        </tr>
                        @endforeach
                        @endif
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>  
</body>
</html>
