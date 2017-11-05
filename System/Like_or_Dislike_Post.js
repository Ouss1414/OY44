$(document).ready(function() {
    $(".Like").click(function () {
        var Like = 'Like';
        var Id_Post = $(this).attr('id');
        var Id_User = $("#Id_User").attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post.php',
            data: {
                Like: Like,
                Id_Post: Id_Post,
                Id_User: Id_User
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

$(document).ready(function() {
    $(".Dislike").click(function () {
        var Dislike = 'Dislike';
        var Id_Post = $(this).attr('id');
        var Id_User = $("#Id_User").attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post.php',
            data: {
                Dislike: Dislike,
                Id_Post: Id_Post,
                Id_User: Id_User
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

$(document).ready(function() {
    $(".Like-profile").click(function () {
        var Like = 'Like';
        var Id_Post = $(this).attr('id');
        var Id_User = $("#Id_User").attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post.php',
            data: {
                Like: Like,
                Id_Post: Id_Post,
                Id_User: Id_User
            },
            success: function (data) {
                if (data) { // Sucess
                    window.location.reload();
                } else { // Error }
                    window.location.reload();
                }
            }
        });
    });
});

$(document).ready(function() {
    $(".Dislike-profile").click(function () {
        var Dislike = 'Dislike';
        var Id_Post = $(this).attr('id');
        var Id_User = $("#Id_User").attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post.php',
            data: {
                Dislike: Dislike,
                Id_Post: Id_Post,
                Id_User: Id_User
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

$(document).ready(function() {
    $(".Like-profile-update").click(function () {
        var Like = 'Like';
        var Id_Post = $(this).attr('id');
        var Id_User = $("#Id_User").attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post_update.php',
            data: {
                Like: Like,
                Id_Post: Id_Post,
                Id_User: Id_User
            },
            success: function (data) {
                if (data) { // Sucess
                    window.location.reload();
                } else { // Error }
                    window.location.reload();
                }
            }
        });
    });
});

$(document).ready(function() {
    $(".Dislike-profile-update").click(function () {
        var Dislike = 'Dislike';
        var Id_Post = $(this).attr('id');
        var Id_User = $("#Id_User").attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post_update.php',
            data: {
                Dislike: Dislike,
                Id_Post: Id_Post,
                Id_User: Id_User
            },
            success: function (data) {
                if (data) { // Sucess
                    window.location.reload();
                } else { // Error }
                    window.location.reload();
                }
            }
        });
    });
});
