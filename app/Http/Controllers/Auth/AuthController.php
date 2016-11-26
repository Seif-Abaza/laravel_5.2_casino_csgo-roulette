<?php

namespace App\Http\Controllers\Auth;

use Invisnik\LaravelSteamAuth\SteamAuth;
use Illuminate\Database\Eloquent;
use App\User;
use Auth;

class AuthController extends Controller
{

    /**
     * @var SteamAuth
     */
    private $steam;

    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    public function login()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();
            if (! is_null($info)) {
                $user = User::where('steamid', $info->getSteamID64())->first();
                if (! is_null($user)) {
                    Auth::login($user, true);
                    return redirect('/'); // redirect to site
                }else{
                    $user = User::create([
                        'name' => $info->getNick(),
                        'avatar'   => $info->getProfilePictureFull(),
                        'steamid'  => $info->getSteamID64()
                    ]);
                    Auth::login($user, true);
                    return redirect('/'); // redirect to site
                }
            }
        }else if(Auth::check()){
            return redirect('/');
        }
        else {
            return $this->steam->redirect(); // redirect to Steam login page
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}