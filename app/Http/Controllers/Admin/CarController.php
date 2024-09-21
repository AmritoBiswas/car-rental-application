<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carList = Car::all();
        return ResponseHelper::Out('success',$carList,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try{
            $img = $request->file('img');
            $time = time();

            $file_name = $img->getClientOriginalName();
            $img_name = "{$time}-{$file_name}";

            $image_url = "uploads/{$img_name}";
            $img->move(public_path('uploads'),$img_name);

            Car::create([
                'name'=>$request->input('name'),
                'brand'=>$request->input('brand'),
                'model'=>$request->input('model'),
                'year'=>$request->input('year'),
                'car_type'=>$request->input('car_type'),
                'daily_rent_price'=>$request->input('daily_rent_price'),
                'image_url'=>$image_url
            ]);
            return ResponseHelper::Out('success','Car added successfully',200);
        }
        catch(Exception $e){
            return ResponseHelper::Out('fail',$e,200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
    }

    /**
     * Display the specified resource.
     */
    public function carById(Request $request)
    {
        $car_id = $request->input('id');
        $carById = Car::find($car_id);
        return ResponseHelper::Out('success',$carById,200);
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
    public function update(Request $request)
    {
        $car_id = $request->input('id');
        
        if($request->hasFile('img')){
            $img = $request->file('img');
            $time = time();

            $file_name = $img->getClientOriginalName();
            $img_name = "{$time}-{$file_name}";

            $image_url = "uploads/{$img_name}";
            $img->move(public_path('uploads'),$img_name);

            $filePath = $request->input('filePath');
            File::delete($filePath);

            Car::where('id','=',$car_id)
                ->update([
                'name'=>$request->input('name'),
                'brand'=>$request->input('brand'),
                'model'=>$request->input('model'),
                'year'=>$request->input('year'),
                'car_type'=>$request->input('car_type'),
                'daily_rent_price'=>$request->input('daily_rent_price'),
                'image_url'=>$image_url
            ]);
            return ResponseHelper::Out('success','Car Updated successfully',200);
        }
        else{
            Car::where('id','=',$car_id)
                ->update([
                'name'=>$request->input('name'),
                'brand'=>$request->input('brand'),
                'model'=>$request->input('model'),
                'year'=>$request->input('year'),
                'car_type'=>$request->input('car_type'),
                'daily_rent_price'=>$request->input('daily_rent_price'),
               
            ]);
            return ResponseHelper::Out('success','Car Updated successfully',200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $car_id = $request->input('id');
        $filePath = $request->input('filePath');

        File::delete($filePath);
        Car::where('id','=',$car_id)->delete();

        return ResponseHelper::Out('success','Car delete successfully',200);
    }
}
