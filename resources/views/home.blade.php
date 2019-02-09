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
                <div class="card-body">
                    @if ($users->count())
                        <h3>Requesting approval</h3>
                        @foreach ($users as $user)
                            <p>{{ ucwords($user->name) }}</p>
                        @endforeach
                    @else
                    <p>No requests found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-3">
    @if ($registrations->count())
        @foreach ($registrations as $registration)
            <div class="col m-3">
                <h1>Registrations</h1>
                <div class="card">
                    <div class="card-header">
                        <h4>{{ ucwords($registration->firstname) }} {{ ucwords($registration->middlename) }} {{ ucwords($registration->lastname) }}</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $registration->gender }}</li>
                        <li class="list-group-item">{{ $registration->birth_month }} {{ $registration->birth_day }} {{ $registration->birth_year }}</li>
                        <li class="list-group-item">{{ $registration->school }}</li>
                        <li class="list-group-item">{{ $registration->parent }} {{ $registration->mobile }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    @else
            <div class="col m-3">
                <p>No Registrations found</p>
            </div>
    @endif
    @if ($orders->count())
        @foreach ($orders as $order)
        <div class="col m-3">
            <h1>Orders</h1>
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h2>{{ ucwords($order->product) }}</h2>
                        <h3>Php {{ $order->price }}</h3>
                    </li>
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
                        <small>{{ date('D, M / d / Y - H:i A',strtotime($order->created_at)) }}</small>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
    @else
        <div class="col m-3">
            <p>No Orders found</p>
        </div>
    @endif
    </div>
</div>
@endsection
