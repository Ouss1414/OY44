<?php

$post = $_POST['delete_id'];
$User_Ids = $_POST['User_Id'];
$date = date("Y/m/d m:i:s");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);


//User
$sql_User = "SELECT * FROM user WHERE  Id = '$User_Ids'";
$result_user = $con->query($sql_User);
if ($result_user->num_rows > 0) {
    while ($row_User = $result_user->fetch_assoc()) {
        $user_university = $row_User['University'];
        $user_college = $row_User['College'];
        $user_dep = $row_User['Department'];

        //University
        $sql_University = "SELECT Id FROM university WHERE  Name = '$user_university'";
        $result_University = $con->query($sql_University);
        if($result_University->num_rows > 0) {
            while ($row_University = $result_University->fetch_assoc()) {
                $Id_University = $row_University['Id'];
            }
        }

        //College
        $sql_College = "SELECT Id FROM college WHERE  Name = '$user_college'";
        $result_College = $con->query($sql_College);
        if($result_College->num_rows > 0) {
            while ($row_College= $result_College->fetch_assoc()) {
                $Id_College = $row_College['Id'];
            }
        }

        //Department
        $sql_Department = "SELECT Id FROM department WHERE  Name = '$user_dep'";
        $result_Department = $con->query($sql_Department);
        if($result_Department->num_rows > 0) {
            while ($row_Department = $result_Department->fetch_assoc()) {
                $Id_Department = $row_Department['Id'];
            }
        }
        break;
    }
}

if(!empty($post) && !ctype_space($post) && !empty($User_Ids) && !ctype_space($User_Ids) && !empty($date) && !ctype_space($date)) {
    $sql = "INSERT INTO post (Message, Date_Post, User_Id , University_Id, College_Id, Department_Id)
                  VALUES ('$post', '$date', '$User_Ids', '$Id_University', '$Id_College', '$Id_Department')";
    mysqli_query($con, $sql);
}else {
    return false;
}


?>