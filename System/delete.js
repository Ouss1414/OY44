$(document).ready(function(){
    $(".delete_data").click(function(){
        var del_id = $(this).attr('id');
        var uni = $(this).attr('value');
        $.ajax({
            type:'POST',
            url:'System/Delete.php',
            data:'delete_id='+del_id,
            success:function(data) {
                if(data) { // Sucess
                    location.href="index.php?pid=Department&"+uni
                } else { // Error }
                }
            }
        });
    });
});