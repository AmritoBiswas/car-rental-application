<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allCar()
    {
        $carList = Car::all();
        // return ResponseHelper::Out('success',$carList,200);
        return view('pages.cars',compact('carList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function listCarByType(Request $request)
    {
        $type = $request->input('car_type');
        $data = Car::where('car_type','=',$type)->get();

        return ResponseHelper::Out('success',$data,200);
    }
    public function listCarByBrand(Request $request)
    {
        $brand = $request->input('brand');
        $data = Car::where('brand','=',$brand)->get();

        return ResponseHelper::Out('success',$data,200);
    }
    public function listCarByRent(Request $request)
    {
        $rent = $request->input('daily_rent_price');
        $data = Car::where('daily_rent_price','=',$rent)->get();

        return ResponseHelper::Out('success',$data,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
