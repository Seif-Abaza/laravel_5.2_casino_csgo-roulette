<?php

namespace app\helpers;
use LRedis;
use Illuminate\Support\Facades\Session;


class GameHelper{

     public static function startingGame(){

     }


    public static function countdown(){

        for($counter = 14; $counter <= 0, $counter --;){
            sleep(1);
            $redis = LRedis::connection();
            $data = ['countdown' => $counter];
            $redis->publish('countdown', json_encode($data));

        }
        return true;
    }

    public static function rates_nulling(){
        Session::forget('bets');
    }

}
?>