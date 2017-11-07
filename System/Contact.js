$(document).ready(function() {
    $(".Send_Contact").click(function () {
        var Name = $("#Name").val();
        var Email = $("#Email").val();
        var Subject = $("#Subject").val();
        var comment = $("#Comment").val();
        if (Name != '' && Email != '' && Subject != '' && comment != '') {

            var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
            if (filter.test(Email)) {
                $.ajax({
                    type: 'POST',
                    url: 'System/Contact.php',
                    data: {
                        Name: Name,
                        Email: Email,
                        Subject: Subject,
                        comment: comment
                    },
                    success: function (data) {
                        if (data) { // Sucess
                            window.location.reload();
                        } else { // Error }
                            document.getElementById("msg").innerHTML = "Thanks, We contact you soon.";
                            document.getElementById("msg-email").innerHTML = "";
                            document.getElementById("Name").style.display = 'none';
                            document.getElementById("Email").style.display = 'none';
                            document.getElementById("Subject").style.display = 'none';
                            document.getElementById("Comment").style.display = 'none';
                            document.getElementById("Send_Contact").style.display = 'none';
                        }
                    }
                });
            }
            else {
                document.getElementById("msg-email").innerHTML = "please, Enter a valid email.";
            }
        }else {
            document.getElementById("msg").innerHTML = "Please, Fill all fields.";
        }
    });
});