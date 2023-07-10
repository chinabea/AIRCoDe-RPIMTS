@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Schedule Index</h1>

        <div id="calendar"></div>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Assigned To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->title }}</td>
                        <td>{{ $schedule->description }}</td>
                        <td>{{ $schedule->start_date }}</td>
                        <td>{{ $schedule->end_date }}</td>
                        <td>{{ $schedule->assignedTo->name }}</td>
                        <td>
                            <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
            });
            calendar.render();
        });
    </script>
@endsection
