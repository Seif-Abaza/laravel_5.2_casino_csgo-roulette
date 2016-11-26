<?php

namespace app\helpers;

use app\User;

class UserHelper{

    /**
     * returns user by name; else false
     * @param $name
     * @return bool
     */
    public static function getUserByName($name){
        $user = User::where('name', $name )->first();
        if($user){
            return $user;
        }else{
            return false;
        }
    }

    /**
     *
     */
    public static function updateUserBalance($winner_color, $users_bet_wager){

        foreach($users_bet_wager as $k){
            $user = User::where('name', $k['name'] )->first();
            if(($k['color'] == $winner_color) && ($winner_color != 'green')){
                $money_won = $k['bet'] * 2;
                $user->current_balance +=  $money_won;
            }elseif($k['color'] == '$winner_color' && $winner_color == 'green' ){
                $money_won = $k['bet'] * 14;
                $user->current_balance +=  $money_won;
            }else{
                $money_lose = $k['bet'];
                $user->current_balance -=  $money_lose;
            }
        }
    }
}