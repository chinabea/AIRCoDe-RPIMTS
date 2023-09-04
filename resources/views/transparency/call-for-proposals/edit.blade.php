@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Call for Proposals</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('transparency.call-for-proposals.edit', $proposals->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="proposaltitle">Call for Proposals</label>
                                    <input type="text" class="form-control" id="proposaltitle" name="proposaltitle" placeholder="Enter Call for Proposals" value="{{$proposals->proposaltitle}}">
                                </div>
                                <div class="form-group">
                                    <label for="proposaldescription">Description</label>
                                    <input type="text" class="form-control" id="proposaldescription" name="proposaldescription" placeholder="Description" value="{{$proposals->proposaldescription}}">
                                </div>
                                <div class="form-group">
                                    <label for="startdate">Start Date</label>
                                    <input type="date" class="form-control" id="startdate" name="startdate" value="{{$proposals->startdate}}">
                                </div>
                                <div class="form-group">
                                    <label for="enddate">End Date</label>
                                    <input type="date" class="form-control" id="enddate" name="enddate" value="{{$proposals->enddate}}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="{{$proposals->status}}">
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks" value="{{$proposals->remarks}}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning float-right">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
