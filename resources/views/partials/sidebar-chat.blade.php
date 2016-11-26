
<!-- chat section  ?-->
<div class="col-lg-3 col-md-3 no-padding">
    <div class="row message-block">

        <div class="col-lg-11" >

            <div id="messages" ></div>

        </div>

        <div class="col-lg-11" >

            <form action="sendmessage" method="POST">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" >

                <input type="hidden" name="user" value="{{ Auth::user()? Auth::user()->name : 'unanimous'  }}" >

                <textarea class="form-control msg"></textarea>

                <br/>

            </form>

        </div>

    </div>
</div>
