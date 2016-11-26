var socket = io.connect('http://localhost:8890');
socket.on('message', function (data) {
    data = jQuery.parseJSON(data);
    console.log(data.user);
    $( "#messages" ).append( "<strong>"+data.user+":</strong><p>"+data.message+"</p>" );
});

socket.on('bet', function (data) {
    data = jQuery.parseJSON(data);
    var st =  '<li><div class="user-smole"> ' +
        '<span>'+data.user+'</span> </div>' +
        '<span class="smole-rate"><img class="casino-icon" src="http://roulette-c.local/assets/img/casino-Glyph-13-128.png" alt=""><span>'+data.bet+'</span></span>' +
        '</li>';

    switch (data.color){
        case 'green':
            $('.greens').append(st);
            break;
        case 'black':
            $('.blacks').append(st);
            break;
        case 'red':
            $('.reds').append(st);
            break;
    }
    $('.bets').append();

    //updates timer
    // console.log(data);

});
socket.on('countdown', function (data) {
    data = jQuery.parseJSON(data);

    if(data != 0){
        $('#wt').text('Rolling In:');
        $('#cd').text(data);
    }else{
        $('#wt').text('');
        $('#cd').text("Rolling...");

        // generate start game event

    }
});
//socket.on('start-game', function(data){
//    var token = $("input[name='_token']").val();
//    $.ajax({
//            type: "POST",
//            url: 'http://roulette-c.local/game-start',
//            dataType: "json",
//            data: {'_token':token},
//            success:function(data){
//                location.reload();
//
//                console.log('game end');
//            },
//            error: function (xhr, status, error) {
//                alert(xhr.responseText);
//            }
//        }
//    );
//});
socket.on('rolling_results', function(data){
   // data = jQuery.parseJSON(data);
    $('.res').text(data);
    $('ul.bets').empty();
    $('#cd').text("Waiting for bet...");
    console.log(data );
});
socket.on('state', function(data){
    console.log(data + ' state');
});
socket.on('errors', function(data){
    console.log(data.body);
});