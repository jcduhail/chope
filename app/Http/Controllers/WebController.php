<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{

    /**
     * Create a new WebController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:web');
    }
    
    /**
     * Log the user out (Invalidate the token) from web
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function weblogout() {

        $user = auth()->user();
        if($user){
            $redis = Redis::connection();
            $arrLogs = [];
            $arrLogs = json_decode(Redis::get('logs_'.$user->id), true);
            
            $arrLogs[date('Y-m-d H:i:s')]= 'WEB-LOGOUT';
            Redis::set('logs_'.$user->id, json_encode($arrLogs));
            
            auth()->logout();
        }
        return redirect('/');
    }
}
