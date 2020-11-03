<?php
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginResponse implements LoginResponseContract {

    public function toResponse($request) {

        $req = $request->all();

        $user = User::where('email', $req['email'])->first();
        
        $redis = Redis::connection();
        $arrLogs = [];
        $arrLogs = json_decode(Redis::get('logs_'.$user->id), true);
        
        $arrLogs[date('Y-m-d H:i:s')]='WEB-LOGIN';
        Redis::set('logs_'.$user->id, json_encode($arrLogs));
        
        return $request->wantsJson()
        ? response()->json(['two_factor' => false])
        : redirect()->intended(config('fortify.home'));
    }
}