<?php

$Num_Question = $_POST['Num_Question'];
$Question = $_POST['Question'];
$Answer_1 = $_POST['Answer_1'];
$Answer_2 = $_POST['Answer_2'];
$Answer_3 = $_POST['Answer_3'];
$Answer_4 = $_POST['Answer_4'];
$Q_Answer = $_POST['Q_Answer'];
$Id_exercise = $_POST['Serial_Book'];

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

$sql_exercise = "SELECT * FROM exercise WHERE Id='$Id_exercise'";
$result_exercise = $con->query($sql_exercise);
if ($result_exercise->num_rows > 0) {
    while ($row_exercise = $result_exercise->fetch_assoc()) {
        if($Question != $row_exercise['Question'] ||
            $Num_Question != $row_exercise['Number_Q'] ||
            $Answer_1 != $row_exercise['Answer_1'] ||
            $Answer_2 != $row_exercise['Answer_2'] ||
            $Answer_3 != $row_exercise['Answer_3'] ||
            $Answer_4 != $row_exercise['Answer_4'] ||
            $Q_Answer != $row_exercise['Q_answer']
        ){
            $sql = "UPDATE exercise SET Question='$Question', Number_Q='$Num_Question', Answer_1='$Answer_1', Answer_2='$Answer_2', Answer_3='$Answer_3', Answer_4='$Answer_4', Q_answer='$Q_Answer' WHERE Id=$Id_exercise";
        }else{
            return false;
        }
    }
}

mysqli_query($con, $sql);

?>