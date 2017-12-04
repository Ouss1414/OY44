$(document).ready(function() {
    $(".Accept_Follow").click(function () {
        var Id = $(this).attr('id');
        var status = 'approve';
        $.ajax({
            type: 'POST',
            url: 'System/AcceptOrRejectFollow.php',
            data: {
                Id: Id,
                status: status
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

    $(".Reject_Follow").click(function () {
        var Id = $(this).attr('id');
        var status = 'reject';
        $.ajax({
            type: 'POST',
            url: 'System/AcceptOrRejectFollow.php',
            data: {
                Id: Id,
                status: status
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