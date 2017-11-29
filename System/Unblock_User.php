<?php

$User_Ids = $_POST['User_Id'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);



if(!empty($User_Ids) && !ctype_space($User_Ids)) {
    $sql = "UPDATE user set Block_User='0' WHERE Id=$User_Ids";
    mysqli_query($con, $sql);
}else {
    return false;
}


?>