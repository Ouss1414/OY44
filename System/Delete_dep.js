$(document).ready(function(){
    $(".Name_dep").click(function () {
        var dep = $(this).attr('name');
        var result = confirm("Are you want to delete this department ( " + dep + " ) ?");
        if (result) {
            //Logic to delete the item
            var dep_del = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'System/Delete_dep.php',
                data: 'dep_del=' + dep_del,
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