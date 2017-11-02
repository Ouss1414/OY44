<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_iebook_8003115736_v";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // This is the directory where images will be saved
    $target = "../Upload_Books/";
    $target_File = $target . basename($_FILES["File_book"]["name"]);
    $target_Image = $target . basename($_FILES["Image_book"]["name"]);

    $Serial = $con->real_escape_string($_POST['Serial']);
    $Name_book = $con->real_escape_string($_POST['Name_book']);
    $Page_book = $con->real_escape_string($_POST['Page_book']);
    $Price_book = $con->real_escape_string($_POST['Price_book']);
    $catagories_book = $con->real_escape_string($_POST['catagories_book']);
    $Available_book = $con->real_escape_string($_POST['Available_book']);
    $File_book = ($_FILES["File_book"]["name"]);
    $Image_book = ($_FILES["Image_book"]["name"]);
    $Summary_book = $con->real_escape_string($_POST['Summary_book']);
    $user_name = $_SESSION['user'];
    $User_Id = '';


    if (empty($Price_book)){
        $Price_book = 'FREE';
    }

//user
    $sql = "SELECT * FROM user WHERE User_Name='$user_name'";
    $result_user = $con->query($sql);
    if ($result_user->num_rows > 0) {
        while ($row_user = $result_user->fetch_assoc()) {
            $User_Id = $row_user['Id'];
        }
    }


        $sql = "INSERT INTO book (Serial, Location, Name_Book, Available, Page, Price, Catagories, Image_Book, User_Id, Summary) 
            VALUE('$Serial','$File_book','$Name_book','$Available_book','$Page_book','$Price_book','$catagories_book','$Image_book','$User_Id','$Summary_book')";

        $con->query($sql);

            move_uploaded_file($_FILES["File_book"]["tmp_name"], $target_File);
            move_uploaded_file($_FILES["Image_book"]["tmp_name"], $target_Image);

    echo '<meta http-equiv="refresh" content="0; \'/OY44/ControlPanel.php?CP=ControlPanel"/>';

}
?>