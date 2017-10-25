$(document).ready(function(){
    $(".button_add_post").click(function(){
        var del_id = $("#Add_Post").val();
        var user_id = $(this).attr('id');
        $.ajax({
            type:'POST',
            url:'System/Add_Post_Profile.php',
            data:{ delete_id: del_id, User_Id: user_id },
            success:function(data) {
                if(data) { // Sucess
                    location.href="index.php?pid=Profile"
                } else { // Error }
                    location.href="index.php?pid=Profile"
                }
            }
        });
    });
});