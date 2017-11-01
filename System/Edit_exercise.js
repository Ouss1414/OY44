$(document).ready(function() {
    $(".Update_Exercise").click(function () {
        var Num_Question = $("#Num_Question").val();
        var Question = $("#Question").val();
        var Answer_1 = $("#Answer_1").val();
        var Answer_2 = $("#Answer_2").val();
        var Answer_3 = $("#Answer_3").val();
        var Answer_4 = $("#Answer_4").val();
        var Q_Answer = $(".Q_Answer:checked").val();
        var user_name = $(this).attr('id');
        var Serial_Book = $(this).attr('name');
        $.ajax({
            type: 'POST',
            url: 'System/Edit_exercise.php',
            data: {
                Num_Question: Num_Question,
                Question: Question,
                Answer_1: Answer_1,
                Answer_2: Answer_2,
                Answer_3: Answer_3,
                Answer_4: Answer_4,
                Q_Answer: Q_Answer,
                User_name: user_name,
                Serial_Book: Serial_Book
            },
            success: function (data) {
                if (data) { // Sucess
                    location.href = "ControlPanel.php?CP=Exercise"
                } else { // Error }
                    location.href = "ControlPanel.php?CP=Exercise"
                }
            }
        });
    });
});