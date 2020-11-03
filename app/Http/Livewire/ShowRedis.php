<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Redis;


class ShowRedis extends Component
{
    public function render()
    {
        
        $user = auth()->user();
        $redis = Redis::connection();
        $arrLogs = [];
        $arrLogs = json_decode(Redis::get('logs_'.$user->id), true);
        if($arrLogs && count($arrLogs)>0){
            krsort($arrLogs);
        }else{
            $arrLogs=[];
        }
        
        return view('livewire.show-redis', ['logs' => $arrLogs]);
    }
}
