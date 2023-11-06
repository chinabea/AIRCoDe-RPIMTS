
@extends('layouts.template') 
@section('content')
<div class="content-wrapper">
  <section class="content-header">
  </section>
    <div class="container mt-5">
        <h1>Notifications</h1>
        <div class="card">
            <div class="card-body">
                <ul class="list-group">
                    @foreach(auth()->user()->unreadNotifications as $notification)
                        <li class="list-group-item">
                            @if ($notification->type === 'App\Notifications\ResearchProposalSubmissionNotification')
                                <!-- Display researcher notification content -->
                                <h4>Research Project Submission</h4>
                                <p>{{ $notification->data['message'] }}</p>
                            @elseif ($notification->type === 'App\Notifications\ResearchProposalSubmissionNotification')
                                <!-- Display director notification content -->
                                <h4>Project Submission for Review</h4>
                                <p>{{ $notification->data['message'] }}</p>
                            @endif
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
