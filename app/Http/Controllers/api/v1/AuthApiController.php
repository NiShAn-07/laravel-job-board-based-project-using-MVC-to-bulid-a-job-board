<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        $token = auth('api')->attempt($credentials);

        if(!$token){
            return response()->json(['messege' => 'Unauthorized'], 401);
        }
        return response()->json(['access_token'=> $token ,
                                        'expires_in' => auth('api')->factory()->getTTL() * 60]
                                        ,200);

    }


    public function logout(Request $request){
        auth('api')->logout(); // this will invalidate the token by marking it as blacklisted
        return response()->json(['messege' => 'Successfully logged out'], 200);

    }


    public function refresh(Request $request){
        $newToken = auth('api')->refresh();
        return response()->json(['refresh_token'=> $newToken ,
                                        'expires_in' => auth('api')->factory()->getTTL() * 60]
                                        ,200);

    }



    public function me(Request $request){
       
        $user = auth('api')->user();
        return response()->json($user  , 200); 
    }

}
