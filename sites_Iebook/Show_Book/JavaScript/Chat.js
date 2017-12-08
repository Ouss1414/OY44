$(function () {
    $(document).on('submit', '.chatForm',function () {
        var text = $("#text").val();
        var name = $("#name").val();
        var Sbook = $("#Sbook").val();

        if(text != "" && name != "" && Sbook != ""){
            $.post('sites_Iebook/Show_Book/ChatPoster.php',{text: text, name: name, Sbook: Sbook},function(data) {
                $(".chatMessages").append(data);
            });
        }else{
            alert("Data Missing");
        }

    });


    function getMessages() {
        var SerialBook = $("#Sbook").val();
        $.get('GetMessages.php',{Sbook: SerialBook},function (data) {
            $(".chatMessages").html(data);

        });

    }

    setInterval(function () {
        getMessages();

    },500);

});