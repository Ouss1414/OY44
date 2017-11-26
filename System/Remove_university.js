$(document).ready(function(){
    $(".delete_uni").click(function () {
        var Id_uni = $(this).attr('id');
        var result = confirm("Are you sure want delete all information of this university?!!");
        if (result){
            $.ajax({
                type: 'POST',
                url: 'System/Remove_university.php',
                data: 'Id_uni=' + Id_uni,
                success: function (data) {
                    if (data) { // Sucess
                        location.href = "ControlPanel.php?CP=Control_University";
                    } else { // Error }
                        alert("Error, Please try again>")
                    }
                }
            });
        }
    });
});