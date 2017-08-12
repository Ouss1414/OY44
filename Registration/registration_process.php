
<?php
session_start();
ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iebook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Fname = $conn->real_escape_string($_POST['Fname']);
$Lname = $conn->real_escape_string($_POST['Lname']);
$email = $conn->real_escape_string($_POST['email']);
$username = $conn->real_escape_string($_POST['username']);
$password = md5($_POST['password']);
$Phone_Number = $conn->real_escape_string($_POST['Phone_Number']);
$gender = $conn->real_escape_string($_POST['gender']);
$Date_of_berth = $conn->real_escape_string($_POST['Date_of_berth']);
$country = $conn->real_escape_string($_POST['country']);
$city = $conn->real_escape_string($_POST['city']);
$university = $conn->real_escape_string($_POST['university']);
$college = $conn->real_escape_string($_POST['college']);
$department = $conn->real_escape_string($_POST['department']);
$Academic_Number = $conn->real_escape_string($_POST['Academic_Number']);
$website = $conn->real_escape_string($_POST['website']);


$sql = "INSERT INTO user (User_Type,First_Name,Last_Name,Email,User_Name,Password,Phone_Number,Gender,Date_Of_Birth,Country,City,University,College,Department,Academic_Number,Web_Site)
                  VALUES ('user','$Fname','$Lname','$email','$username','$password','$Phone_Number','$gender','$Date_of_berth','$country','$city','$university','$college','$department','$Academic_Number','$website')";


$user_info = mysqli_query($conn, "SELECT * FROM user WHERE User_Name = '$username' ");

$user = mysqli_fetch_assoc($user_info);
$_SESSION['user'] = $username ;

echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Home\'"/>';

header('Location: /OY44/index.php?pid=Home');

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
