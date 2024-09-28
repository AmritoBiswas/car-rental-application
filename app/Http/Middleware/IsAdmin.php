<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   

          $token = $request->cookie('token');
          $result = JWTToken::ReadToken($token);

       
            
            $user_id = $result->userID;
            $roleJson = DB::table('users')->select('role')->where('id','=',$user_id)->get();

        // Decode JSON to an associative array
        $array = json_decode($roleJson, true);

        // Access the role value
        $role = $array[0]['role'];

        
        if ($role == 'admin') {
            $request->headers->set('email',$result->userEmail);
            $request->headers->set('id',$result->userID);
            return $next($request);
        }
        else{
            return redirect('/login');
        }
    }
        
}

