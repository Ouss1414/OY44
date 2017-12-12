$(function () {
    $('.msg_wrap').hide();
    $('.msg_head').click(function(){
        $('.msg_wrap').slideToggle('slow');
        $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
    });

    $(document).on('submit', '.chatForm',function () {
        var text = $("#text").val();
        var name = $("#name").val();
        var Sbook = $("#Sbook").val();

        if(text != "" && name != "" && Sbook != ""){
            $.post('sites_Iebook/Show_Book/ChatPoster.php',{text: text, name: name, Sbook: Sbook},function(data) {
                $(".msg_body").append(data);
                $("#text").val('');
                $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
            });
        }else{
            alert("Data Missing");
        }

    });


    function getMessages() {
        var SerialBook = $("#Sbook").val();
        $.get('GetMessages.php',{Sbook: SerialBook},function (data) {
            $(".msg_body").html(data);
        });

    }

    setInterval(function () {
        getMessages();
    },500);

});