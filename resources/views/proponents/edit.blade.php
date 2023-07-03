@extends('layouts.app')

@section('content')
    <h1>Edit Proponent</h1>
    <form action="{{ route('proponents.update', $proponent->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $proponent->title }}">
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <label for="content">Content:</label>
        <textarea name="content" id="content">{{ $proponent->content }}</textarea>
        @error('content')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <button type="submit">Update</button>
    </form>
@endsection


@extends('layouts.template')
@section('title', 'Comments')

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Comments Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Comments Details</a></li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <h1 class="display-4">Edit Proponent</h1>
    <form action="{{ route('proponents.update', $proponent->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" value="{{ $proponent->title }}" class="form-control">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea name="content" id="content" class="form-control">{{ $proponent->content }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>






  </div>
  @include('layouts.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
