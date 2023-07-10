@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Schedule Calendar</h1>

        <div id="calendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '{{ route("schedules.calendar") }}',
            });
            calendar.render();
        });
    </script>
@endsection
