jQuery(document).ready(function(){
    $('.toggle-cont').click(function(){

        $('.chatInfo').toggleClass('active-cont');
        $('.toggle-cont').toggleClass('active-bott');
    });


    $(".msg").keydown(function(e){
        if(e.keyCode == 13) {
            e.preventDefault();
            var token = $("input[name='_token']").val();
            var user = $("input[name='user']").val();
            var msg = $(".msg").val();
            if (msg != '') {
                $.ajax({
                    type: "POST",
                    url: 'http://roulette-c.local/sendmessage',
                    dataType: "json",
                    data: {'_token': token, 'message': msg, 'user': user},
                    success: function (data) {
                        console.log(data);
                        $(".msg").val('');
                    }
                });

            } else {
                alert("Please Add Message.");
            }
        }

    })

});


