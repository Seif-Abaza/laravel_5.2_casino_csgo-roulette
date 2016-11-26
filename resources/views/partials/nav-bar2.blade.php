<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to("/") }}"><img src="{{asset('assets/img/logo.png')}}" alt="logo"> &nbsp &nbsp &nbsp &nbsp</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="{{ request()->is('deposit')  ? 'active' : '' }}"><a href="{{ URL::to("/deposit") }}">Deposit <span class="sr-only">(current)</span></a></li>
                <li class="{{ request()->is('withdraw')  ? 'active' : '' }}"><a href="{{ URL::to("/withdraw") }}">Withdraw</a></li>
                <li class="{{ request()->is('support')  ? 'active' : '' }}"><a href="{{ URL::to("/support") }}">Support</a></li>
                <li class="{{ request()->is('free-coins')  ? 'active' : '' }}"><a href="{{ URL::to("/free-coins") }}">Free Coins</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
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
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>