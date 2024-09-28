@extends('layout.app')
@section('content') 
    

    
   

   
    <div class="container">
        @foreach ($booking as $booked )
        <div class="row my-3 d-flex justify-content-center align-items-center bg-dark p-5">
            <div class="col-4">
                <div>
                    <img src="{{$booked['car']['image_url']}}" alt="">
                </div>
            </div>
            <div class="col-8">
                <div class="content">
                    <h3 class="text-light p-3">{{$booked['car']['name']}}</h3>
                    <div class="book-info d-flex justify-content-around">
                        <p class="text-light">Total Cost:  {{$booked->total_cost}}</p>
                        <p class="text-light">From:{{$booked->start_date}}</p>
                        <p class="text-light">To:  {{$booked->end_date}}</p>
                    </div>
                    <p class="text-primary">Status: {{$booked->status}}</p>
                    <button class="btn btn-danger">Calcel</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection