<?php
session_start();
ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$Name_User = $_SESSION['user'];

$Name_University = $_GET['uni'];
$Name_College = $_GET['college'];
$Name_Department = $_GET['dep'];

//User
$sql_User = "SELECT Id FROM user WHERE  User_Name = '$Name_User'";
$result_User = $con->query($sql_User);
if($result_User->num_rows > 0) {
    while ($row_User = $result_User->fetch_assoc()) {
        $Id_User = $row_User['Id'];
    }
}

//University
$sql_University = "SELECT Id FROM university WHERE  Name = '$Name_University'";
$result_University = $con->query($sql_University);
if($result_University->num_rows > 0) {
    while ($row_University = $result_University->fetch_assoc()) {
        $Id_University = $row_University['Id'];
    }
}

//College
$sql_College = "SELECT Id FROM college WHERE  Name = '$Name_College'";
$result_College = $con->query($sql_College);
if($result_College->num_rows > 0) {
    while ($row_College= $result_College->fetch_assoc()) {
        $Id_College = $row_College['Id'];
    }
}

//Department
$sql_Department = "SELECT Id FROM department WHERE  Name = '$Name_Department'";
$result_Department = $con->query($sql_Department);
if($result_Department->num_rows > 0) {
    while ($row_Department = $result_Department->fetch_assoc()) {
        $Id_Department = $row_Department['Id'];
    }
}

    $Subject = $_POST['Subject'];
    $Message = $_POST['myrichtext'];
    $Date = date("Y/m/d m:i:s");

    $sql = "INSERT INTO post (Subject,Message,User_Id,Date_Post,University_Id,College_Id,Department_Id)
                  VALUES ('$Subject','$Message','$Id_User','$Date','$Id_University','$Id_College','$Id_Department')";


if ($con->query($sql) === TRUE) {
    echo '<meta http-equiv="refresh" content="0; \'/OY44/index.php?pid=Department&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'"/>';
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();


?>