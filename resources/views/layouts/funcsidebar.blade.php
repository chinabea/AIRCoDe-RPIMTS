@php
    $role = auth()->user()->role;
@endphp

@if($role === 1)
    @include('director.sidebar')
@elseif($role === 2)
    @include('staff.sidebar')
@elseif($role === 3)
    @include('researcher.sidebar')
@elseif($role === 4)
    @include('reviewer.sidebar')
@else
    @include('sidebar-guest')
@endif
