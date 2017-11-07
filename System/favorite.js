$(document).ready(function() {
    $(".Favorite").click(function () {
        var Id_User = $(this).attr('name');
        var Id_Book = $(this).attr('value');
        $.ajax({
            type: 'POST',
            url: 'System/favorite.php',
            data: {
                Id_Book: Id_Book,
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
    $(".UnFavorite").click(function () {
        var Id_User = $(this).attr('name');
        var Id_Book = $(this).attr('value');
        $.ajax({
            type: 'POST',
            url: 'System/UnFavorite.php',
            data: {
                Id_User: Id_User,
                Id_Book: Id_Book
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

