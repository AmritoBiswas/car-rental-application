<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;


class UserController extends Controller
{

    //Page Controllers

    function LoginPage(){
        return view('auth.login');
    }

    function Register(){
        return view('auth.register');
    }
    //Create User
    function UserRegistration(Request $request){
        try{
            User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'phone_number'=>$request->input('phone_number'),
                'password'=>$request->input('password'),
            ]);
            return ResponseHelper::Out('success','You are added as customer',200);
        }
        catch(Exception $e){
            return ResponseHelper::Out('fail',$e,200);
        }
    }

    //user Login
    function UserLogin(Request $request){
        $count = User::where('email','=',$request->input('email'))
        ->where('password','=',$request->input('password'))
        ->select('id')
        ->first();


        if($count !== null){
            $token = JWTToken::CreateToken($request->input('email'),$count->id);
            $email = $request->header('email');
            return ResponseHelper::Out($email,'success',200)->cookie('token',$token, time() + 60*60);
        }
        else{
            return ResponseHelper::Out('fail','Check Email and Password',200);
        }
    }
    //User Logout
    function UserLogout(){
        return redirect('/userLogin')->cookie('token','',-1);
    }
}
