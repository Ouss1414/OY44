
<?php
session_start();
ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $select_user = $conn->escape_string($_POST['select_user']);
    $Fname = $conn->real_escape_string($_POST['firstName']);
    $Lname = $conn->real_escape_string($_POST['secondName']);
    $email = $conn->real_escape_string($_POST['email']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($_POST['password']);
    $Phone_Number = $conn->real_escape_string($_POST['phone']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $Date_of_berth = $conn->real_escape_string($_POST['Date_of_berth']);
    $country = $conn->real_escape_string($_POST['country']);
    $city = $conn->real_escape_string($_POST['city']);
    $website = $conn->real_escape_string($_POST['website']);


    $sql = "INSERT INTO user (User_Type,First_Name,Last_Name,Email,User_Name,Password,Phone_Number,Gender,Date_Of_Birth,Country,City,Web_Site)
                  VALUES ('$select_user','$Fname','$Lname','$email','$username','$password','$Phone_Number','$gender','$Date_of_berth','$country','$city','$website')";


    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("The user is added")</script>';
        echo "<meta http-equiv=\"refresh\" content=\"0; '/OY44/ControlPanel.php?CP=Add_User";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

}

?>
