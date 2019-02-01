@extends('layouts.app')

@section('title', 'Triton | Athletes')

@section('content')
    <div class="container">
        <div class="row border-bottom">
            <div class="col-sm">
                <h1>Athletes</h1>
            </div>
            @auth
                <div class="col-sm">
                    <a href="/athletes/create" class="btn btn-primary float-right">Create</a>
                </div>
            @endauth
        </div>
        <div class="row">
            @foreach ($athletes as $athlete)
            <div class="col-sm">
                <div class="card mt-3 mb-3" style="width: 18rem;">
                    <div class="card-header">
                        <h3 class="text-center">{{ ucwords($athlete->fullname) }}</h3>
                    </div>
                    <img class="card-img-top" style="height: 275px;" src="storage/uploads/{{ $athlete->main_dp }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{ ucfirst($athlete->introduction) }}</p>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-primary btn-block">View</button>
                    </div>
                    @auth
                    <div class="card-body">
                        <a href="/athletes/{{ $athlete->id }}/edit" class="btn btn-warning card-link float-left">Edit</a>
                        <form action="athletes/{{ $athlete->id }}" method="POST" enctype="multipart/form-data">
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