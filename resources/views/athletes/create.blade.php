@extends('layouts.app')

@section('title', 'Add Athlete')

@section('content')
    <div class="container">
        <form action="/athletes" method="POST" enctype="multipart/form-data" class="border-bottom">
            @csrf
            <div class="row">
                <div class="form-group m-3 col-sm">
                    <input type="text" name="fullname" id="" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-group m-3 col-sm">
                    <input type="text" name="nickname" id="" class="form-control" placeholder="Nick Name">
                </div>
                <div class="form-group m-3 col-sm">
                    <input type="text" name="school" id="" class="form-control" placeholder="School">
                </div>
            </div>
            <div class="row">
                <div class="form-group m-3 col-md">
                    <textarea name="introduction" id="" rows="3" class="form-control" placeholder="Introduction"></textarea>
                </div>
                <div class="form-group m-3 col-sm">
                    <select name="category" id="" class="form-control">
                        <option value="" selected disabled>Category</option>
                        <option value="Competitive">Competitive</option>
                        <option value="Advanced">Advanced</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Learn To Swim">Learn To Swim</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group m-3 col-sm">
                    <label for="main_dp">Main Display Picture</label>
                    <input type="file" name="main_dp" id="main_dp" class="form-control">
                </div>
                <div class="form-group m-3 col-sm">
                    <label for="secondary_dp">Secondary Display Picture</label>
                    <input type="file" name="secondary_dp" id="secondary_dp" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group m-3 col-lg">
                    <input type="submit" value="Save" class="btn btn-outline-primary float-right">
                </div>
            </div>
        </form>
    </div>
@endsection