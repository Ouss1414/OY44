<?php

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Subject = $_POST['Subject'];
$comment = $_POST['comment'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

if(!empty($Name) && !ctype_space($Name) && !empty($Email) && !ctype_space($Email) && !empty($Subject) && !ctype_space($Subject) && !empty($comment) && !ctype_space($comment)) {

    $sql = "INSERT INTO contact (Name, Email, Subject, Message)
                     VALUES ('$Name', '$Email', '$Subject', '$comment')";
    mysqli_query($con, $sql);
return true;
}else{
    return false;
}

?>