$(document).ready(function(){
    var int = 0;
    $('.volume i').click(function(){
        if(int == 0){
            $('.volume i').addClass('fa-volume-off');
            $('.volume i').removeClass('fa-volume-up');
            int = 1;
        }else{
            $('.volume i').removeClass('fa-volume-off');
            $('.volume i').addClass('fa-volume-up');
            int = 0
        }

    });

    /**
     *
     */
    $(function() {
        var select = $( "#minbeds" );
        var max_bal = $('#max-bal').text();
        var slider = $( "#slider"  ).slider({
            min: 0,
            max: max_bal,
            range: "min",
            value: select.val(),
            slide: function( event, ui ) {
                select.val(ui.value);
                $('#max-bal').text(max_bal - ui.value);

            }
        });
        $( "#minbeds" ).change(function() {
            slider.slider( "value", select.val() );
            $('#max-bal').text(max_bal - select.val());
        });
    });


    /**
     *
     */
    $(".bet").click(function(e){
        e.preventDefault();
        var token = $("input[name='_token']").val();
        var user = $("input[name='user']").val();
        var color = $(this).attr('name');
        var bet = $('#minbeds').val();
        if(bet != 0){
            $.ajax({
                type: "POST",
                url: 'http://roulette-c.local/set-bet',
                dataType: "json",
                data: {'_token':token,'bet':bet, 'color':color, 'user':user},
                success:function(data){
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });

        }else{
            alert("Some Alert");
        }

    })

});
function getTotals(){

}
//gets  state on window load
$(window).load(function() {
    var token = $("input[name='_token']").val();
    $.ajax({
        type: "POST",
        url: 'http://roulette-c.local/get-state',
        dataType: "json",
        data: {'_token':token, 'test': 'test'},
        success:function(data){
            //console.log(data);
            data.users_bet_wager.forEach(function(v,k){
                var st = '<li><div class="user-smole"> ' +
                    '<span>'+v.user+'</span> </div>' +
                    '<span class="smole-rate"><img class="casino-icon" src="http://roulette-c.local/assets/img/casino-Glyph-13-128.png" alt=""><span>'+v.bet+'</span></span>' +
                    '</li>';
                    switch(v.color){
                        case 'red':
                            $('.reds').append(st);
                            break;
                        case 'green':
                            $('.greens').append(st);
                            break;
                        case 'black':
                            $('.blacks').append(st);
                            break;
                        default:  '';
                    }
                    })

        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
    console.log("window load occurred!");
});