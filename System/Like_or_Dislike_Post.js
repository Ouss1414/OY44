$(document).ready(function() {
    $(".Like").click(function () {
        var Like = 'Like';
        var Id_Post = $(this).attr('id');
        var uni = $("#uni").attr('name');
        var college = $("#college").attr('name');
        var dep = $("#dep").attr('name');
        var Subject = $("#Subject").attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post.php',
            data: {
                Like: Like,
                Id_Post: Id_Post
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
        var uni = $("#uni").attr('name');
        var college = $("#college").attr('name');
        var dep = $("#dep").attr('name');
        var Subject = $("#Subject").attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post.php',
            data: {
                Dislike: Dislike,
                Id_Post: Id_Post
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
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post.php',
            data: {
                Like: Like,
                Id_Post: Id_Post
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
        $.ajax({
            type: 'POST',
            url: 'System/Like_or_Dislike_Post.php',
            data: {
                Dislike: Dislike,
                Id_Post: Id_Post
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
