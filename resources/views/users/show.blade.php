@extends('layouts.template')
@section('title', 'User Detail')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li> --}}
            </ol>
          </div>
        </div>
      </div>
    </section>

        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3"></h3>
                <input type="text" class="card-title p-3" name="name" value="{{ $users->name }}" readonly>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <input type="text" name="email" value="{{ $users->email }}" readonly>
                    <br>
                    <input type="date" name="role" value="{{ $users->role }}" readonly>
                    <br>
                    A wonderful serenity has taken possession of my entire soul,
                    like these sweet mornings of spring which I enjoy with my whole heart.
                    I am alone, and feel the charm of existence in this spot,
                    which was created for the bliss of souls like mine. I am so happy,
                    my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                    that I neglect my talents. I should be incapable of drawing a single stroke
                    at the present moment; and yet I feel that I never was a greater artist than now.
                  <!-- /.tab-pane -->
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Created At</label>
                        <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $users->created_at }}" readonly>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Updated At</label>
                        <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $users->updated_at }}" readonly>
                    </div>
              </div>
            </div>
          </div>
</div>
  @include('layouts.footer')
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
</body>
</html>
