@extends('layouts.app')

@section('title') Edit {{ ucwords($member->member) }} @endsection

@section('content')
    <div class="container border-bottom">
        <form action="/board/{{ $member->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group m-3">
                <input type="text" value="{{ $member->member }}" name="member" placeholder="Full Name" id="" class="form-control">
            </div>
            <div class="form-group m-3">
                <input type="text" value="{{ $member->position }}" name="position" placeholder="Position" class="form-control">
            </div>
            <div class="form-group m-3">
                <label for="member_dp">Image {{ $member->member_dp }}</label>
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