$(document).ready(function(){
    $(".delete_data").click(function () {
        var book = $(this).attr('name');
        var result = confirm("Are you want to delete book ( " + book + " ) ?");
        if (result) {
            //Logic to delete the item
            var del_id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'System/delete_book.php',
                data: 'delete_id=' + del_id,
                success: function (data) {
                    if (data) { // Sucess
                        location.href = "ControlPanel.php"
                    } else { // Error }
                        alert("Error, Please try again>")
                    }
                }
            });
        }
    });
});