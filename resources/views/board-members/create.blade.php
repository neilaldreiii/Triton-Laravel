@extends('layouts.app')

@section('title', 'Add Board Member')

@section('content')
    <div class="container border-bottom">
        <form action="/board" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="m-3">Add Board Member</h4>
            <div class="form-group m-3">
                <input type="text" name="member" placeholder="Full Name" id="" class="form-control">
            </div>
            <div class="form-group m-3">
                <input type="text" name="position" placeholder="Position" class="form-control">
            </div>
            <div class="form-group m-3">
                <label for="member_dp">Image</label>
                <input type="file" name="member_dp" class="form-control" id="member_dp">
            </div>
            <div class="row m-3">
                <div class="form-group col-sm">
                    <input type="submit" value="Save" class="btn btn-outline-primary float-right">
                </div>
            </div>
        </form>
    </div>
@endsection