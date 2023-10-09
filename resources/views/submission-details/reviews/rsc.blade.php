@extends('layouts.template')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        
    </section> 
<div class="container mt-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Summarized Comments</h6>
        </div>
        <div class="card-body pad table-responsive">
            <div class="container mt-4">
                <h2 class="text-center mb-4">Recommendations, Suggestions, and Comments (RSC)</h2>
    
            <table class="table table-bordered table-sm text-right">
                <thead>
                    <tr class="text-center">
                        <th width="50%">TOPICS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            <b>Project Name</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_name !== null && $review->project_id)
                                <li>{{ $review->project_name }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Research Group</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->research_group !== null && $review->project_id)
                                <li>{{ $review->research_group }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Author(s)</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_authors !== null && $review->project_id)
                                <li>{{ $review->project_authors }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Introduction</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_introduction !== null && $review->project_id)
                                <li>{{ $review->project_introduction }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Aims and Objectives</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_aims_and_objectives !== null && $review->project_id)
                                <li>{{ $review->project_aims_and_objectives }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Background</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_background !== null && $review->project_id)
                                <li>{{ $review->project_background }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Expected Research Contribution</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->research_contribution !== null && $review->project_id)
                                <li>{{ $review->research_contribution }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>The Proposed Methodology</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_methodology !== null && $review->project_id)
                                <li>{{ $review->project_methodology }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Start Date</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_start_date !== null && $review->project_id)
                                <li>{{ $review->project_start_date }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>End Date</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_end_date !== null && $review->project_id)
                                <li>{{ $review->project_end_date }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Work Plan</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_workplan !== null && $review->project_id)
                                <li>{{ $review->project_workplan }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Resources</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_resources !== null && $review->project_id)
                                <li>{{ $review->project_resources }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>References</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_references !== null && $review->project_id)
                                <li>{{ $review->project_references }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Total Budget</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->project_total_budget !== null && $review->project_id)
                                <li>{{ $review->project_total_budget }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <b>Other Recommendation, Suggestion and Comments</b>
                            <ul>
                                @foreach ($revs as $review)
                                @if ($review->user->role === 2 && $review->other_rsc !== null && $review->project_id)
                                <li class="mt-0">{{ $review->other_rsc }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm accomplish-button" data-status="in_progress">
                                <i class="fas fa-spinner"></i> In Progress
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection