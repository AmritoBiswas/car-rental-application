@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <h2>Price per day: ${{$car->daily_rent_price}}</h2>
                <input hidden id="id" type="text" value="{{$car->id}}">
            </div>
        </div>
    </div>
     <!-- Book Area -->
     <div class="book-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="book-img">
                        <img src="{{$car->image_url}}" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="booking-form">
                        <h3>Booking Sheet </h3>
                        <form id="book_form" action="{{route('car.createRent',['car'=>$car->id])}}" method="POST">
                            @csrf
                            <div class="group">
                                <label for="name" class="form-label">Name</label>
                                <input disabled class="form-control" type="text" id="name" name="name" value="{{$user->name}}">
                            </div>
                           <div class="group">
                                <label for="email" class="form-label">Email</label>
                                <input disabled class="form-control" type="email" name="email" id="email" value="{{$user->email}}">
                           </div>
                            <div class="group">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input required class="form-control" type="date" name="start_date" id="start_date">
                            </div>
                            <div class="group">
                                <label for="end_date" class="form-label">End Date</label>
                                <input required class="form-control" type="date" name="end_date" id="end_date">
                            </div>
                            <div class="group mt-3 text-center" id="mobile_submit_button">
                               <button type="submit" class="btn btn-primary">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
          $(document).ready(function() {
            $('#start_date, #end_date').change(function() {
                var startDate = new Date($('#start_date').val());
                var endDate = new Date($('#end_date').val());
                cosole.log(startDate,endDate)

                if (startDate && endDate && startDate <= endDate) {
                    var duration = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
                    var pricePerDay = {{ $car->price_per_day }};
                    var totalPrice = duration * pricePerDay;

                    $('#duration span').text(duration + ' days');
                    $('#total-price span').text(totalPrice + ' $');
                } else {
                    $('#duration span').text('X days');
                    $('#total-price span').text('Y $');
                }
            });
        });

        document.getElementById("mobile_submit_button").addEventListener("click", function() {
            document.getElementById("book_form").submit();
        });
</script>


    <!-- Book Area End -->
@endsection