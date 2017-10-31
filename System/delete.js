$(document).ready(function(){
    $(".delete_data").click(function () {
        var Post = $(this).attr('name');
        var result = confirm("Are you want to delete post ( " + Post.substring(0,20) + " ...) ?");
        if (result) {
            //Logic to delete the item
            var del_id = $(this).attr('id');
            var uni = $(this).attr('value');
            $.ajax({
                type: 'POST',
                url: 'System/Delete.php',
                data: 'delete_id=' + del_id,
                success: function (data) {
                    if (data) { // Sucess
                        location.href = "index.php?" + uni
                    } else { // Error }
                        alert("Error, Please try again>")
                    }
                }
            });
        }
    });
});