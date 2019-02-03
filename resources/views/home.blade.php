@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @foreach ($users as $user)
                    {{ $user->name }}
                @endforeach
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
    @foreach ($registrations as $registration)
        <div class="row mt-3 mb-3">
            <div class="col m-3">
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
        </div>
    @endforeach
</div>
@endsection
