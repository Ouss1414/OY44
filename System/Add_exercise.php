<?php

$Num_Question = $_POST['Num_Question'];
$Question = $_POST['Question'];
$Answer_1 = $_POST['Answer_1'];
$Answer_2 = $_POST['Answer_2'];
$Answer_3 = $_POST['Answer_3'];
$Answer_4 = $_POST['Answer_4'];
$Q_Answer = $_POST['Q_Answer'];
$User_name = $_POST['User_name'];
$Serial_book = $_POST['Serial_Book'];
$Id_user = "";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

if($Q_Answer == '1'){
    $Q_Answer = $Answer_1;
}else if($Q_Answer == '2'){
    $Q_Answer = $Answer_2;
}else if($Q_Answer == '3'){
    $Q_Answer = $Answer_3;
}else if($Q_Answer == '4'){
    $Q_Answer = $Answer_4;
}

//User
$sql_User = "SELECT * FROM user WHERE  User_Name='$User_name'";
$result_user = $con->query($sql_User);
if ($result_user->num_rows > 0) {
    while ($row_User = $result_user->fetch_assoc()) {
        $Id_user = $row_User['Id'];
    }
}
    $sql = "INSERT INTO exercise (Question, Number_Q, Answer_1, Answer_2, Answer_3, Answer_4, Q_answer, Serial_Book, User_Id)
                          VALUES ('$Question', '$Num_Question', '$Answer_1', '$Answer_2', '$Answer_3', '$Answer_4', '$Q_Answer', '$Serial_book', '$Id_user')";
    mysqli_query($con, $sql);

?>