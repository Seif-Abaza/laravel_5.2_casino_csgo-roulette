<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class MainController extends Controller
{
    /**
     * Home action
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
          return view('main.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deposit(){
        return view('main.deposit');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function withdraw(){
        return view('main.withdraw');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function support(){
        return view('main.support');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function freeCoins(){
        return view('main.freeCoins');
    }


}
