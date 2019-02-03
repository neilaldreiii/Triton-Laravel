@extends('layouts.app')

@section('title', 'Triton Swim Club')

@section('content')
    <div class="container-fluid">
        <div style="width: 70%;" id="carouselExampleIndicators" class="carousel slide m-auto border rounded" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="height: 770px;" class="d-block w-100 rounded" src="/storage/images/banner-one.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img style="height: 770px;" class="d-block w-100 rounded" src="/storage/images/banner-two.jpg" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col mt-3 mb-3">
                <h1 style="font-size: 44pt; color: #555;" class="text-center">Welcome To Triton Swim Club</h1>
                <p class="text-center">By joining Naga City swimming team and TRITON you are becoming a member of the city’s organized youth sport. Your child is getting involved in what can truly be a “lifetime sport,” and hopefully, will make lifetime friends.</p>
                <p class="text-center">TRITON is a private swimming team in Naga City which started in May 2017.</p>
                <p class="text-center">A board of parent volunteers runs the team. Board members are selected in May or June for the following swim year</p>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3 mb-4">
                <h1 class="text-center">Mission</h1>
                <p class="text-center">The Naga Triton Swimming Club is a competitive swim team emphasizing both individual and club excellence in a positive, family oriented atmosphere with the goal of producing lifelong HAPPY swimmers.</p>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3 mb-3">
                <h1 class="text-center">TRITON Code of Conduct</h1>
                <p class="text-center">As a swimmer, I understand that I must follow these rules to stay in good standing</p>
                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item">
                        <span class="text-primary">R - </span> 
                        <span class="text-primary">Respect</span> 
                        <p class="text-secondary">  Respect the coaches, the sport, teammates and yourself. I will respect the coaches’ direction and authority. I will respect the rules and regulations of the sport. I will respect my teammates. I will show self-respect and not use abusive language.</p>
                    </li>
                    <li class="list-group-item">
                        <span class="text-primary">A - </span>
                        <span class="text-primary">Attitude</span>
                        <p class="text-secondary">I will try to keep a positive attitude. I will think positively and approach even the most difficult tasks with a good and forward thinking attitude.</p>
                    </li>
                    <li class="list-group-item">
                        <span class="text-primary">C - </span>
                        <span class="text-primary">Conduct</span>
                        <p class="text-secondary">I will demonstrate good sportsmanship before, during and after practice and swim meets. I will be courteous to any official, coach or swimmer from another team. I will be modest when successful and be gracious in defeat. I will refrain from the use of drugs, tobacco, alcohol and abusive language.</p>
                    </li>
                    <li class="list-group-item">
                        <span class="text-primary">E - </span>
                        <span class="text-primary">Encouraging</span>
                        <p class="text-secondary"> I will encourage my teammates and promote good sportsmanship. By displaying encouraging actions, I will be helping myself and my teammates achieve our goal of excellence.</p>
                    </li>
                    <li class="list-group-item">
                        <span class="text-primary">D - </span>
                        <span class="text-primary">Discipline</span>
                        <p class="text-secondary">I will be responsible for my behavior. In ensuring a positive learning environment at practice and at swim meets, I understand the levels of discipline.</p>
                    </li>
                  </ul>
            </div>
        </div>
    </div>
@endsection