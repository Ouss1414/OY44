$(document).ready(function(){
    $(".delete_data").click(function(){
        var del_id = $(this).attr('id');
        var uni = $(this).attr('value');
        var sub = $(this).attr('name');
        $.ajax({
            type:'POST',
            url:'System/Delete.php',
            data:'delete_id='+del_id,
            success:function(data) {
                if(data) { // Sucess
                    alert("The Post " + sub + " Deleted")
                    location.href="index.php?pid=Department&"+uni
                } else { // Error }
                    alert("Error, Please try again>")
                }
            }
        });
    });
});