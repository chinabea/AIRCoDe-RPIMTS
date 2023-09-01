<!-- resources/views/notifications.blade.php -->

@extends('layouts.template') <!-- Replace with your layout file -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Notifications</div>

                    <div class="card-body">
                        <ul>
                            @foreach ($notifications as $notification)
                                <li>
                                    <!-- {{ $notification->data['message'] }}
                                    <a href="{{ $notification->data['link'] }}">View</a> -->
                                    <p>{{ $notification->data['message'] }}</p>
                                    <p>Project ID: {{ $notification->data['project_id'] }}</p>
                                    <a href="{{ $notification->data['link'] }}">View Project</a>

                                    <!-- @foreach(auth()->user()->unreadNotifications as $notification)
                                        @include('notifications.' . snake_case(class_basename($notification->type)))
                                    @endforeach -->
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
