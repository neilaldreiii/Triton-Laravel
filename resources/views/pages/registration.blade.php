@extends('layouts.app')

@section('title', 'Triton | Registration')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col-sm">
                <h1 class="text-center mt-3 mb-4">Registration</h1>
                <p class="text-center">
                    The NAGA TRITON Swimming Club is a not for-profit organization run solely by parent volunteers and is self-supporting through membership dues and fundraising. Fees and fundraising efforts go directly towards the team’s operating expenses including pool rental, coaches’ salaries, travel expenses, equipment, and supplies.
                </p>
                <a href="#registerAthlete" class="btn btn-block btn-outline-primary mt-5 mb-5">Proceed to registration</a>
            </div>
        </div>
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col col-lg-3">
                <h4>Payment of Fees</h4>
            </div>
            <div class="col">
                <p class="text-justify">Monthly fees are invoiced the 1st of each month .Payments must be made every 1st week of each month.</p>
            </div>
        </div>
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col col-lg-3">
                <h4>Delinquent Accounts</h4>
            </div>
            <div class="col">
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <p>Account balances are expected to be paid by the 15th of the month. Fees past due will be charged a late fee of P100 per each month they are unpaid.</p>
                    </li>
                    <li class="list-group-item">
                        <p>Any families with accounts more than 90 days past due will be placed on Inactive Status (which includes not participating in any TRITON activities, meets or practices).</p>
                    </li>
                    <li class="list-group-item">
                        <p>All outstanding accounts must be paid in full before a swimmer can be re-registered.</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col col-lg-3">
                <h4>Membership Fee</h4>
            </div>
            <div class="col">
                <p class="text-justify">Non-refundable 1 time fee due at the time of registration. These funds help pay for pool rental, coaches’ salaries, etc. (P1000)</p>
            </div>
        </div>
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col col-lg-3">
                <h4>Monthly Dues</h4>
            </div>
            <div class="col">
                <p class="text-justify">A family is responsible for monthly dues throughout the entire swim year. (P700)</p>
                <div class="card mt-3 mb-3">
                    <div class="card-header">
                        <h6 class="text-info">Note</h6>
                    </div>
                    <div class="card-body">
                        <p>No refunds or waived fees will be given, even if a swimmer has not attended practice within a particular month. Swimmers may not enter the pool or participate in meets during the month(s) they are inactive.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col col-lg-3">
                <h4>Naga Swimming Registration Fee</h4>
            </div>
            <div class="col">
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <p>Swimmers joining Batang Pinoy: P__ for the calendar swim year.</p>
                    </li>
                    <li class="list-group-item">
                        <p>Swimmers joining G League : P__ for the summer season.</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col col-lg-3">
                <h4>Fundraising and Volunteering</h4>
            </div>
            <div class="col">
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <p>Each year, the TRITON Swim Team holds a fundraising event in the form of a “Swim-A-Thon/Mayor’s Cup”.</p>
                    </li>
                    <li class="list-group-item">
                        <p>TRITON hosts 2 meet a year. Because these meets are major fundraisers, all TRITON team swimmers are entered to swim in these meets and are expected to participate.</p>
                    </li>
                    <li class="list-group-item">
                        <p>All TRITON families are expected to volunteer to help run the TRITON-hosted meets. Families who choose not to volunteer at a meet will be charged an additional P___ fundraising fee.</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col col-lg-3">
                <h4>Scholarships</h4>
            </div>
            <div class="col">
                <p class="text-justify">TRITON and other school may offer a scholarship programs for families encountering financial hardship. Any family interested in the scholarship program may submit a request to the Board in writing or via email, detailing their situation.</p>
            </div>
        </div>
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col col-lg-3">
                <h4>Leaving the Team</h4>
            </div>
            <div class="col">
                <p class="text-justify">Should your swimmer decide to quit the team for any reason, the team should be notified, in writing, by the person responsible for the account.</p>
                <div class="card mt-3 mb-3">
                    <div class="card-header">
                        <h6 class="text-info">Note</h6>
                    </div>
                    <div class="card-body">
                        <p>Fees will not be refunded when a swimmer leaves the team.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col">
                <h3 id="registerAthlete" class="text-center">Register</h3>
                @include('inc.register')
            </div>
        </div>
    </div>
@endsection