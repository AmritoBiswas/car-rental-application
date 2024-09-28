<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RentalController extends Controller
{
    public function create(Request $request,$car_id){
        $user_id = $request->header('id');
        $user = User::find($user_id);
        $car = Car::find($car_id);
        return view('pages.book',compact('car','user'));
    }

    public function createRent(Request $request,$car_id){
        $request->validate([
            'start_date'=>'required|date|after_or_equal:today',
            'end_date'=>'required|date|after:start_date'
        ]);
        
        
        $car = Car::find($car_id);
        $user= User::find($request->header('id'));

        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        $days = $start->diffInDays($end);
        $price_per_day = $car->price_per_day;

        if($car->availability == 1){
            
        $rental = new Rental();
        $rental->car()->associate($car);
        $rental->user()->associate($user);
        $rental->start_date = $start;
        $rental->end_date = $end;
        $rental->total_cost= $days * $price_per_day;
        $rental->status='Onging';
        $rental->save();

        $car->availability = false;
        $car->save();

        return redirect('/booked');

        }
        else{
            return ResponseHelper::Out('Failed','The car is already reserved',200);
        }
    }

    public function bookedList(Request $request){
        $user_id = $request->header('id');
        $booking = Rental::where('user_id','=',$user_id)->with('car')->with('user')->get();
        return view('pages.booked',compact('booking'));
}
}
