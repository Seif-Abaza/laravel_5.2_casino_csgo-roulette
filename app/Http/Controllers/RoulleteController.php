<?php

namespace App\Http\Controllers;

use app\models\roulette\SimpleRoulette;
use App\User;
use Illuminate\Http\Request;

use app\models\roullette\Game;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use app\helpers\UserHelper;
use app\helpers\GameHelper;
use Cache;
use LRedis;
use Redis;

class RoulleteController extends Controller
{
    /**
     * Template for game instance
     * @var array
     */
    protected $users_bet_wager = [];
    protected $start_getting_bets = 1;

    protected $winner_number;
    protected $winner_color;

    /**
     * sets the bets if $start_getting_bets = 1
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setBet(Request $request){
        if($this->start_getting_bets == 1) {
            $validator = Validator::make($request->all(), [
                'bet' => 'required|numeric|min:1',
                'color' => 'required|max:6',
                'user' => 'required|max:255'
            ]);
            if ($validator->fails()) {
                return $validator->errors('bet');
            }
            $this->pushBet($request);

            $redis = LRedis::connection();
            $data = ['bet' => $request->bet, 'color' => $request->color, 'user' => $request->user];
            $redis->publish('bet', json_encode($data));
            return response()->json(['success' => 555]);
        }
    }



    public function getState(Request $request){
        $this->users_bet_wager = Cache::get('bets');
        //$this->users_bet_wager = json_encode($this->users_bet_wager);
        return response()->json([
            'users_bet_wager'=> Cache::get('bets')
        ]);
    }
    protected function pushBet($request){
//        Cache::forget('bets');
//        Session::forget('first_bet');
//        return;
        $this->users_bet_wager = Cache::get('bets');
        if($this->users_bet_wager == null){

            $this->users_bet_wager[0] = $request->all();
            Cache::add('bets', $this->users_bet_wager, 1);
           // var_dump( Cache::get('bets')); die;
            $redis = LRedis::connection();
            $data = ['coun-st' => 'dfdfdf'];
            $redis->publish('coun-st', json_encode($data));

        }else{
            array_push($this->users_bet_wager, $request->all());
        }

        Cache::put('bets', $this->users_bet_wager, 1);
        $this->users_bet_wager = Cache::get('bets');

    }

    /**
     * starts the game and sets $start_getting_bets = 1
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function gameStart(Request $request, SimpleRoulette $roulette){


            $this->start_getting_bets = 0;

            $roulette->spin();
            $this->winner_color = $roulette->get_color();
            $this->winner_number = $roulette->get_number();
       // var_dump(Cache::get('bets')); die;
            $this->updateUserBalance($this->winner_color, Cache::get('bets'));
            //dd($a);

            Cache::forget('bets');

            $redis = LRedis::connection();
            $data = [
                'winner_number' => $this->winner_number,
                'color' => $this->winner_color,
            ];
            $redis->publish('rolling_results', json_encode($data));
            return response()->json(
                [
                ]
            );
            $this->start_getting_bets = 1;

    }

    public function updateUserBalance($winner_color, $arr){

        foreach($arr as $k){

            $user = User::where('name', $k['user'] )->first();

            if($k['color'] == $winner_color && $winner_color != 'green'){
                $money_won = $k['bet'] * 2;
                $user->current_balance +=  $money_won;
            }elseif($k['color'] == $winner_color && $winner_color == 'green' ){
                $money_won = $k['bet'] * 14;
                $user->current_balance +=  $money_won;
            }else{
                $money_lose = $k['bet'];
                $user->current_balance -=  $money_lose;
            }

            $user->save();
        }
    }

}
