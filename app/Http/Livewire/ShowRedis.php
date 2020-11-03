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
        $arrLogin = [];
        $arrLogs = json_decode(Redis::get('logs_'.$user->id), true);
        krsort($arrLogs);
        return view('livewire.show-redis', ['logs' => $arrLogs]);
    }
}
