$(document).ready(function(){
    $(".Block_User").click(function(){
        var user_id = $(this).attr('id');
        $.ajax({
            type:'POST',
            url:'System/Block_User.php',
            data:{ User_Id: user_id },
            success:function(data) {
                if(data) { // Sucess
                    window.location.reload()
                } else { // Error }
                    window.location.reload()
                }
            }
        });
    });

    $(".UnBlock_User").click(function(){
        var user_id = $(this).attr('id');
        $.ajax({
            type:'POST',
            url:'System/Unblock_User.php',
            data:{ User_Id: user_id },
            success:function(data) {
                if(data) { // Sucess
                    window.location.reload()
                } else { // Error }
                    window.location.reload()
                }
            }
        });
    });
});