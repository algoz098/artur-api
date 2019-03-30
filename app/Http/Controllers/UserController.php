<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Str;

class UserController extends Controller
{
    public function autoRegister(Request $request){
        $auth = $request->header('Authorization');
        
        if(!isset($auth)) return response(['uid'], 403);

        if(isset($request->api_token)){
            return response(['invalid request'], 403);
        }

        if(!isset($request->api_token) && User::where('uid', $auth)->count() > 0){
            return response(['token missing'], 403);
        }

        $user = new User;
        $user->uid = $auth;
        $user->api_token = Str::random(60);
        $user->save();

        Auth::login($user, true);

        return $user;
    }
}
