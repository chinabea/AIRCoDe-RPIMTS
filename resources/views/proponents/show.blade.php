@extends('layouts.app')

@section('content')
    <h1>{{ $proponent->title }}</h1>
    <p>Status: {{ $proponent->status }}</p>
    <p>{{ $proponent->content }}</p>
    <a href="{{ route('proponents.edit', $proponent->id) }}">Edit</a>
@endsection


<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">Project Details</h1>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <h4>Title</h4>
              <p>{{ $proponent->title }}</p>
            </div>
            <div class="col-md-6">
              <h4>Status</h4>
              <p>{{ $proponent->status }}</p>
            </div>
          </div>
            <div class="col-md-6">
              <h4>Start Date</h4>
              <p>{{ $proponent->created_at }}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4>Content</h4>
              <p>{{ $proponent->content }}</p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
