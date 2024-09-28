@extends('layout.app')
@section('content')
    <!-- Banner Area -->
    <div class="banner-area" style="height: 480px;">
        <div class="container">
            <div class="banner-content">
                <h1>Rent a car nationwide</h1>
                
                 
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Banner Form Area -->
    <div class="banner-form-area">
        <div class="container">
            <div class="banner-form">
                
                    <div class="row align-items-center">  
                        <div class="col-lg-4 col-md-4">
                            <a href="{{route('allCar')}}" type="submit" class="default-btn btn-bg-one border-radius-5">
                                Book a Car
                            </a>
                        </div>
                    </div>
                  
                
            </div>
        </div>
    </div>
    <!-- Banner Form Area End -->

    <!-- Car Area -->
    <div class="room-area pt-100 pb-70 section-bg" style="background-color:#ffffff">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">CARS</span>
                <h2>Our Cars</h2>
                <a href="{{route('allCar')}}" type="submit" class="default-btn mt-5 btn-bg-one border-radius-5">
                    All Cars
                </a>
            </div>
            <div class="row pt-45">
                @foreach ($cars as $car)
                <div class="col-lg-6">
                    <div class="room-card-two">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4 p-0">
                                <div class="room-card-img">
                                    <a href="room-details.html">
                                        <img src="{{$car->image_url}}" alt="Images">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-8 p-0">
                                <div class="room-card-content">
                                     <h3>
                                         {{$car->name}}
                                    </h3>
                                    <span>${{$car->daily_rent_price}}/day </span>

                                    <ul>
                                        <li><i class='bx bx-car'></i> Brand:{{$car->brand}}</li>
                                        <li><i class='bx bx-show-alt'></i> {{$car->model}}</li>
                                    </ul>

                                    <ul>
                                        <li><i class='bx bx-timer'></i>{{$car->year}}</li>
                                        <li><i class='bx bxs-hotel'></i> {{$car->car_type}}</li>
                                    </ul>
                            
                                    <a href=/rentform/{{$car->id}} class="book-more-btn">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- Car Area End -->

    <!-- Car Area Two-->
    <div class="book-area-two pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="book-content-two">
                        <div class="section-title">
                            <span class="sp-color">MAKE A QUICK BOOKING</span>
                            <h2>We Are the Best in All-time & So Please Get a Quick Booking</h2>
                            <p>
                                Atoli is one of the best car retal company in the global market and that's why you will get a luxury  period on the global market. We always
                                provide you a special support for all of our client and that's will  be the main reason to be the most popular.
                            </p>
                        </div>
                        <a href="#" class="default-btn btn-bg-three">Quick Booking</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="book-img-2">
                        <img src="uploads/car (40).jpg" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Book Area Two End -->

   

    <!-- Testimonials Area Three -->
    <div class="testimonials-area-three pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">TESTIMONIAL</span>
                <h2>Our Latest Testimonials and What Our Client Says</h2>
            </div>
            <div class="row align-items-center pt-45">
                <div class="col-lg-6 col-md-6">
                    <div class="testimonials-img-two">
                        <img src="{{asset('frontend/assets/img/testimonials/testimonials-img5.jpg')}}" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="testimonials-slider-area owl-carousel owl-theme">
                        <div class="testimonials-slider-content">
                            <i class="flaticon-left-quote"></i>
                            <p>
                                You can easily make a good and easily the best service on 
                                this agency. This is one of the best and crucial service into
                                the global world. We will start to make a communications
                                with this agency and saw that, this has made our all of the
                                problems in an easiest way.
                            </p>
                            <ul>
                                <li>
                                    <img src="{{asset('frontend/assets/img/testimonials/testimonials-img1.jpg')}}" alt="Images">
                                    <h3>Mary Marden</h3>
                                    <span>New York City</span>
                                </li>
                            </ul>
                        </div>

                        <div class="testimonials-slider-content">
                            <i class="flaticon-left-quote"></i>
                            <p>
                                You can easily make a good and easily the best service on 
                                this agency. This is one of the best and crucial service into
                                the global world. We will start to make a communications
                                with this agency and saw that, this has made our all of the
                                problems in an easiest way.
                            </p>
                            <ul>
                                <li>
                                    <img src="{{asset('frontend/assets/img/testimonials/testimonials-img1.jpg')}}" alt="Images">
                                    <h3>Harriet Johnson</h3>
                                    <span>London City</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials Area Three End -->
@endsection