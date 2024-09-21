<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerList = User::where('role','=','customer')->get();
        return ResponseHelper::Out('success',$customerList,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try{
            User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'phone_number'=>$request->input('phone_number'),
                'password'=>$request->input('password'),
            ]);
            return ResponseHelper::Out('success','Customer added Successfully',200);
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
    public function show(Request $request)
    {
        $userId = $request->input('id');
        $user = DB::table('users')->where('id', $userId)->get();
        return ResponseHelper::Out('success',$user,200);
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
        $userId = $request->input('id');
        return User::where('id','=',$userId)->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone_number'=>$request->input('phone_number'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user_id = $request->input('id');

        return User::where('id','=',$user_id)->delete();
    }
}
