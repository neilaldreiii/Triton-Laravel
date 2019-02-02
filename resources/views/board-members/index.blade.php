@extends('layouts.app')

@section('title', 'Triton | Board Members')

@section('content')
    <div class="container">
        <div class="row border-bottom">
            <div class="col-sm">
                <h1>Board Members</h1>
            </div>
            @auth
                <div class="col-sm">
                    <a href="/board/create" class="btn btn-primary float-right">Create</a>
                </div>
            @endauth
        </div>
        <div class="row">
            @foreach ($members as $member)
            <div class="col-sm mt-3 mb-3">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        <h3>{{ $member->position }}</h3>
                    </div>
                    <img style="max-height: 325px;" src="/storage/uploads/{{ $member->member_dp }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">{{ ucwords($member->member) }}</p>
                    </div>
                    @auth
                        <div class="card-body">
                            <a href="/board/{{ $member->id }}/edit" class="btn btn-warning float-left">Edit</a>
                            <form action="board/{{ $member->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-right">Delete</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection