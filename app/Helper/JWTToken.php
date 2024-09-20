<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken {
    
    //Create Token
    public static function CreateToken($userEmail, $userID):string{
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 60*60,
            'userEmail' => $userEmail,
            'userID' =>$userID
        ];
        return JWT::encode($payload, $key,'HS256');
    } 

     //Read Token
     public static function ReadToken($token){
        try{
            if($token == null){
                return 'unauthorized';
            }
            else{
                $key = env('JWT_KEY');
                return JWT::decode($token, new Key($key,'HS256'));
            }
        }
        catch(Exception $e){
            return 'unauthorized';
        }
     }  
}