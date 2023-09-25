@extends('layouts.template')

@section('content')

<div class="content-wrapper">
    <!-- <section class="content-header">
        
    </section> -->
<div class="container mt-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Summarized Comments</h6>
        </div>
        <div class="card-body pad table-responsive">
            <table class="table table-bordered table-sm text-right">
                <tbody>
                    <tr class="text-center">
                        <th scope="row" width="50%">PROJECT ID</th>
                        <td>1</td>
                    </tr>
                    <tr class="text-center">
                        <th>PROJECT TITLE</th>
                        <td>Kellie Guerrero</td>
                    </tr>
                    <tr class="text-center">
                        <th>PROJECT LEADER</th>
                        <td>Mrs. Maida Lind
                            <a href="http://127.0.0.1:8000/emailbox/compose" class="btn btn-default btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Send Email">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th>STATUS</th>
                        <td>Under Evaluation</td>
                    </tr>
                    <tr class="text-center">
                        <th>DATE SUBMITTED</th>
                        <td>2023-09-22 10:30:35</td>
                    </tr>
                    <tr class="text-center">
                        <th>LAST UPDATE</th>
                        <td>2023-09-22 10:30:35</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection