<!-- the nav bar  ?-->
<div class="row nav-bar">
    <div id="logo" class="col-md-2">
        <a href="{{ URL::to("/") }}"><img src="{{asset('assets/img/logo.png')}}" alt="logo"></a>
    </div>
    <div class="col-md-8">
        <ul class="nav nav-pills">
            <li class="active">
                <a href="{{ URL::to("/deposit") }}">Deposit</a>
            </li>
            <li><a href="{{ URL::to("/withdraw") }}">Withdraw</a></li>
            <li><a href="{{ URL::to("/support") }}">Support</a></li>
            <li><a href="{{ URL::to("/free-coins") }}">Free Coins</a></li>
        </ul>
    </div>
    <div class="col-md-2">
        <ul class="hr">
            @if(\Illuminate\Support\Facades\Auth::user())
                <li>
                    <div class="avatar">
                        <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar}}" alt="logo">
                    </div>
                </li>
                <li>
                    <a href="{{ URL::to("/logout") }}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </li>
            @else
                <li>
                    <a href="{{ URL::to("/login") }}">
                        <img src="{{asset('assets/img/Login.png')}}" alt="logo">
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>