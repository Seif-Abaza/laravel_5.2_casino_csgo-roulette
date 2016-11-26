@extends('layouts.main')

@section('title', 'Home')

@section('sidebar')
    @parent
@stop

@section('content')

    <link rel="stylesheet" href="{{asset('assets/css/csgo.css')}}">
            <div class="">
                <div class="err"></div>
                <div class="row roll-full-cont">
                    <div class="csgo-top-cont">
                        <div class="col-md-5">
                            <div class="rolling-cont">
                                <img src="{{asset('assets/img/csgostrong_bomb_inverted_new.svg')}}" alt="">
                                <span class="roll">
                                    <p id="wt">Waiting for bet...</p>
                                    <p id="cd"></p>
                                </span>
                                <span class="volume"><i class="fa fa-volume-up" aria-hidden="true"></i></span>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="previous">
                                <p>Previous numbers:</p>
                                <span class="item green">87</span>
                                <span class="item red">86</span>
                                <span class="item black">7</span>
                                <span class="item green">7</span>
                                <span class="item black">8</span>
                                <span class="item red">97</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="roulette-slider roll-box">

                            </div>
                            <span class=""></span>
                        </div>
                        <div class="col-md-12">
                            <div class="wolete-cont">
                                <div class="col-md-4 wolete-cont-left">
                                    <div>
                                        <label for="wager-input">
                                            Wager :
                                        </label>
                                        <div>
                                            <i></i>
                                            <form id="reservation">
                                                  <input type="number" id="minbeds" value="0" max="{{ \Auth::user()? \Auth::user()->current_balance: 0 }}">

                                            </form>
                                        </div>
                                    </div>
                                    <div>
                                        <p>Balance:</p>
                                        <img class="casino-icon" src="{{asset('assets/img/casino-Glyph-blue.png')}}" alt="">
                                        <span id="max-bal">{{ \Auth::user()? \Auth::user()->current_balance: 0 }}</span>
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div id="slider"></div>
                                    <p>Slide the bar to set your wager amount</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="row">
                                <div class="col-md-12 res">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <div>
                                        <span name="red" class="bott-cont-big bet red">1 To 7, Win 2x </span>
                                    </div>
                                    <div>
                                        <img class="casino-icon" src="{{asset('assets/img/casino-Glyph-red.png')}}" alt=""><span>888</span></div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <div>
                                        <span name="green" class="bott-cont-big bet green">1 To 7, Win 2x </span>
                                    </div>
                                    <div><img class="casino-icon" src="{{asset('assets/img/casino-Glyph-green.png')}}" alt=""></div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <div>
                                        <span name="black" class="bott-cont-big bet black">1 To 7, Win 2x </span>
                                    </div>
                                    <div><img class="casino-icon" src="{{asset('assets/img/casino-Glyph-13-128.png')}}" alt=""></div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="favoris-cont">
                                <img src="https://s3.eu-central-1.amazonaws.com/stronguserimages/c160d49f7a842f408051bbada040b7d154bbcaf5_full.jpg"
                                     alt="">
                                <div class="text-cont">
                                    <span class="red-text">Highest RED</span>
                                    <span>Musta</span>
                                    <span><img class="casino-icon" src="{{asset('assets/img/casino-Glyph-red.png')}}" alt=""><span>888</span></span>
                                </div>
                            </div>
                            <div class="total-cont">
                                <h4>Total: <img class="casino-icon" src="{{asset('assets/img/casino-Glyph-13-128.png')}}" alt=""><span>158589</span></h4>
                                <ul class="bets reds">

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="favoris-cont">
                                <img src="https://s3.eu-central-1.amazonaws.com/stronguserimages/c160d49f7a842f408051bbada040b7d154bbcaf5_full.jpg"
                                     alt="">
                                <div class="text-cont">
                                    <span class="green-text">Highest RED</span>
                                    <span>Musta</span>
                                    <span><img class="casino-icon" src="{{asset('assets/img/casino-Glyph-green.png')}}" alt=""><span>888</span></span>
                                </div>
                            </div>
                            <div class="total-cont">
                                <h4>Total: <img class="casino-icon" src="{{asset('assets/img/casino-Glyph-13-128.png')}}" alt=""><span>158589</span></h4>
                                <ul class="bets greens">

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="favoris-cont">
                                <img src="https://s3.eu-central-1.amazonaws.com/stronguserimages/c160d49f7a842f408051bbada040b7d154bbcaf5_full.jpg"
                                     alt="">
                                <div class="text-cont">
                                    <span class="black-text">Highest RED</span>
                                    <span>Musta</span>
                                    <span><img class="casino-icon" src="{{asset('assets/img/casino-Glyph-13-128.png')}}" alt=""><span>888</span></span>
                                </div>
                            </div>
                            <div class="total-cont">
                                <h4>Total: <img class="casino-icon" src="{{asset('assets/img/casino-Glyph-13-128.png')}}" alt=""><span>158589</span></h4>
                                <ul class="bets blacks">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <script src="{{asset('assets/js/csgo.js')}}"></script>
    <script src="{{asset('assets/js/roulette.js')}}"></script>
@stop