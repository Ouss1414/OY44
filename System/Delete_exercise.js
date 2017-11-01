$(document).ready(function(){
    $(".delete_exercise").click(function () {
        var exercise = $(this).attr('name');
        var result = confirm("Are you want to delete book ( " + exercise.substring(0,20) + "... ) ?");
        if (result) {
            //Logic to delete the item
            var del_id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'System/Delete_exercise.php',
                data: 'delete_id=' + del_id,
                success: function (data) {
                    if (data) { // Sucess
                        location.href = "ControlPanel.php?CP=Exercise"
                    } else { // Error }
                        alert("Error, Please try again>")
                    }
                }
            });
        }
    });
});