@extends('layout.app')
@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg9">
        <div class="container">
            <div class="inner-title">
                <h3> Select Your Car</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Room Area -->
    <div class="room-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">CARS</span>
                <h2>Our Cars & Rates</h2>
            </div>
            <div class="row pt-45">
              @foreach ($carList as $car )
              <div class="col-lg-4 col-md-6">
                <div class="room-card">
                    <a href="">
                        <img src="{{$car->image_url}}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="room-details.html">{{$car->name}}</a></h3>
                        <h4>Brand: {{$car->brand}}</h4>
                        <ul>
                            <li class="text-color">Model: {{$car->model}}</li>
                        </ul>
                        <p class="text-color">{{$car->year}}</p>
                        <div class="rating text-color">
                           ${{$car->daily_rent_price}}/day
                        </div>
                        <a href="{{route('car.rentCreateForm',['car_id'=>$car->id])}}" class="btn btn-primary text-center">Reserve Now</a>
                    </div>
                </div>
            </div>
              @endforeach

            </div>
        </div>
    </div>
    <!-- Room Area End -->
@endsection