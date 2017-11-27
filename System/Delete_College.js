$(document).ready(function(){
    $(".Name_college").click(function () {
        var college = $(this).attr('name');
        var result = confirm("Are you want to delete this college ( " + college + " ) ?");
        if (result) {
            //Logic to delete the item
            var college_del = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'System/Delete_College.php',
                data: 'college_del=' + college_del,
                success: function (data) {
                    if (data) { // Sucess
                        window.location.reload();
                    } else { // Error }
                        window.location.reload();
                    }
                }
            });
        }
    });
});