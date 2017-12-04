$(document).ready(function() {
    $(".Unfollow").click(function () {
        var Id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'System/Unfollow.php',
            data: {
                Id: Id
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