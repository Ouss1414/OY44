$(document).ready(function() {
    $(".Follow").click(function () {
        var Id = $(this).attr('id');
        var Id_follow = $(this).attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Follow.php',
            data: {
                Id: Id,
                Id_follow: Id_follow
            },
            success: function (data) {
                if (data) { // Sucess
                    window.location.reload()
                } else { // Error }
                    window.location.reload()
                }
            }
        });
    });
});