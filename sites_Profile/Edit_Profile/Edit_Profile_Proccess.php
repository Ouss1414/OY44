<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iebook";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Fname = $con->real_escape_string($_POST['firstName']);
    $Lname = $con->real_escape_string($_POST['secondName']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $Phone_Number = $con->real_escape_string($_POST['phone']);
    $gender = $con->real_escape_string($_POST['gender']);
    $Date_of_berth = $con->real_escape_string($_POST['Date_of_berth']);
    $country = $con->real_escape_string($_POST['country']);
    $city = $con->real_escape_string($_POST['city']);
    $university = $con->real_escape_string($_POST['university']);
    $college = $con->real_escape_string($_POST['college']);
    $department = $con->real_escape_string($_POST['department']);
    $Academic_Number = $con->real_escape_string($_POST['Academic_Number']);
    $website = $con->real_escape_string($_POST['website']);

    $Name_User = $_SESSION['user'];

//User
$sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
$result_user = $con->query($sql_User);
if ($result_user->num_rows > 0) {
    while ($row_User = $result_user->fetch_assoc()) {
        $Pass_User = $row_User['Password'];

        if ($Pass_User === $password){
            $Pass_User = $_POST['password'];
        }else{
            $Pass_User = md5($password);
        }
    }
}
    $sql = "UPDATE user SET First_Name='$Fname',
                        Last_Name='$Lname',
                        Email='$email',
                        Password='$Pass_User',
                        Phone_Number='$Phone_Number',
                        Gender='$gender',
                        Date_Of_Birth='$Date_of_berth',
                        Country='$country',
                        City='$city',
                        University='$university',
                        College='$college',
                        Department='$department',
                        Academic_Number='$Academic_Number',
                        Web_Site='$website'
                         WHERE User_Name = '$Name_User'";
    $con->query($sql);

    if ($con->query($sql) === TRUE) {
        echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Edit successfully</div>';
        echo '<meta http-equiv="refresh" content="1; \'/OY44/index.php?pid=Edit_Profile"/>';
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    mysqli_close($con);
}
?>