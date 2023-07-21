@extends('layouts.app')

@section('content')
    <h1>Projects Approved</h1>

    @if(count($projects) > 0)
        <ul>
            @foreach($projects as $project)
                <li>
                    <strong>Project Name:</strong> {{ $project->projname }}<br>
                    <strong>Research Group:</strong> {{ $project->researchgroup }}<br>
                    <strong>Start Date:</strong> {{ $project->start_date }}<br>
                    <strong>End Date:</strong> {{ $project->end_date }}<br>
                    <!-- Display other project details as needed -->
                </li>
            @endforeach
        </ul>
    @else
        <p>No projects currently under evaluation.</p>
    @endif
@endsection
