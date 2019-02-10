@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card m-3">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card m-3">
                <div class="card-header">
                    <h3>Requesting approval</h3>
                </div>
                <div class="card-body">
                    @if ($users->count())
                        <ul class="list-group">
                            @foreach ($users as $user)
                                <li class="list-group-item d-flex justify-content-between">
                                    <p>{{ ucwords($user->name) }}</p>
                                    <p><b>Joined:</b> {{ date('D, M / d / Y - h:i A',strtotime($user->created_at)) }}</p>
                                    <div class="d-flex justify-content-center">
                                        <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PATCH")
                                            <button type="submit" class="m-1 btn btn-outline-success">Approve <i class="fas fa-check"></i></button>
                                        </form>
                                        <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="m-1 btn btn-outline-danger">Decline <i class="fas fa-times"></i></button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No requests found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-3">
    @if ($registrations->count())
        <div class="col m-3">
            <h1>Registrations</h1>
            @foreach ($registrations as $registration)
                <div class="card mt-3 mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ ucwords($registration->firstname) }} {{ ucwords($registration->middlename) }} {{ ucwords($registration->lastname) }}</h4>
                        <form action="/registration/{{ $registration->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="m-1 btn btn-outline-primary">Done <i class="fas fa-check"></i></button>
                        </form>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ ucfirst($registration->gender) }}</li>
                        <li class="list-group-item">{{ $registration->birth_month }} {{ $registration->birth_day }} {{ $registration->birth_year }}</li>
                        <li class="list-group-item">{{ $registration->school }}</li>
                        <li class="list-group-item d-flex justify-content-between">
                            <p>{{ $registration->parent }}</p>
                            <p>{{ $registration->mobile }}</p>
                        </li>
                        <li class="list-group-item"><small>Registered on: {{ date('D, M / d / Y - h:i A',strtotime($registration->created_at)) }}</small></li>
                    </ul>
                </div>
            @endforeach
        </div>
    @else
        <div class="col m-3">
            <p>No Registrations found</p>
        </div>
    @endif
    <div class="col m-3">
        @if ($orders->count())
            <h1>Orders</h1>
            @foreach ($orders as $order)
                <div class="card mt-3 mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h2>{{ ucwords($order->product) }}</h2>
                        <h3>Php {{ $order->price }}</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            {{ ucwords($order->fullname) }}
                        </li>
                        <li class="list-group-item">
                            {{ ucwords($order->address) }}
                        </li>
                        <li class="list-group-item">
                            {{ $order->mobile_number }}
                        </li>
                        <li class="list-group-item">
                            <small>Order placed on: {{ date('D, M / d / Y - h:i A',strtotime($order->created_at)) }}</small>
                        </li>
                    </ul>
                </div>
            
            @endforeach
        @else
    </div>
        <div class="col m-3">
            <p>No Orders found</p>
        </div>
    @endif
    </div>
</div>
@endsection
