<!-- create-project-team.blade.php -->

@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    PROJECT TEAM
                </div>
                <div class="card-body pad table-responsive">
                    <form method="post" action="{{ route('project-teams.store') }}" enctype="multipart/form-data">
                        <!-- {{ method_field('POST') }} -->
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="member_name">Name</label>
                                <input type="text" class="form-control" id="member_name" name="member_name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role">
                                    <option disabled selected>Select Role</option>
                                    <option>Project Leader</option>
                                    <option>Database Designer</option>
                                    <option>Network Designer</option>
                                    <option>UI Designer</option>
                                    <option>Quality Assurance</option>
                                    <option>Document Writer</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
