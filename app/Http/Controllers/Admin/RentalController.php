<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    //all pages
    public function dashBoard(){
        $cars = Car::all()->count();
        $available_cars = Car::where('availability','=', true)->count();
        $total_rents = Rental::all()->count();
        $total_price = DB::table('rentals')->sum('total_cost');
        
        return view('backend.pages.dashboard.dashboard-page',compact('cars','available_cars','total_rents','total_price'));
    }

    //All rent list

    public function rentPage(){
        
        return view('backend.pages.dashboard.manage-rent');
    }


    public function editRentStatus(Rental $rental){
        

        $rental = Rental::with('car')->with('user')->get();
        return ResponseHelper::Out('rentSuccess',$rental,200);
       
    }
    public function updateRentStatus(Rental $rental,Request $request,$id){
        
        $rental = Rental::find($id);
        $car_id = $rental->car_id;
        $car = Car::find($car_id);
        
       

        if($request->status =='Completed' || $request->status =='Canceled'){
            $rental->status = $request->status;
            $car->availability = true;
            $car->save();
        }

        $rental->save();
        return ResponseHelper::Out('Car','updated',200);
    }

    
}
