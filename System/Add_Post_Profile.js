$(document).ready(function(){
    $(".button_add_post").click(function(){
        var del_id = $("#Add_Post").val();
        $.ajax({
            type:'POST',
            url:'System/Add_Post_Profile.php',
            data:'delete_id='+del_id,
            success:function(data) {
                if(data) { // Sucess

                } else { // Error }
                    alert("Error, Please try again>")
                }
            }
        });
    });
});