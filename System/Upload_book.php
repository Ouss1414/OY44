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

    //book
    $sql = "SELECT * FROM book";
    $result_book = $con->query($sql);
    if ($result_book->num_rows > 0) {
        while ($row_book = $result_book->fetch_assoc()) {
            if ($Serial == $row_book['Serial']){
                echo '<script>alert("This Serial ('.$row_book['Serial'].') is already exists.")</script>';
            }elseif ($File_book == $row_book['Location']){
                echo '<script>alert("This File ('.$row_book['Location'].') is already exists.")</script>';
            }elseif ($Name_book == $row_book['Name_Book']) {
                echo '<script>alert("This name book ('.$row_book['Name_Book'].') is already exists.")</script>';
            }elseif ($Image_book == $row_book['Image_Book']){
                echo '<script>alert("This image name ('.$row_book['Image_Book'].') is already exists.")</script>';
            }
        }
        echo '<meta http-equiv="refresh" content="0; \'/OY44/ControlPanel.php?CP=New-Book"/>';
    }

    if(
        !empty($Serial) && !ctype_space($Serial) &&
        !empty($Name_book) && !ctype_space($Name_book) &&
        !empty($Page_book) && !ctype_space($Page_book) &&
        !empty($catagories_book) && !ctype_space($catagories_book) &&
        !empty($Available_book) && !ctype_space($Available_book) &&
        !empty($File_book) && !ctype_space($File_book) &&
        !empty($Image_book) && !ctype_space($Image_book)

    ){
        $sql = "INSERT INTO book (Serial, Location, Name_Book, Available, Page, Price, Catagories, Image_Book, User_Id, Summary) 
            VALUE('$Serial','$File_book','$Name_book','$Available_book','$Page_book','$Price_book','$catagories_book','$Image_book','$User_Id','$Summary_book')";

        if ($con->query($sql)) {

            move_uploaded_file($_FILES["File_book"]["tmp_name"], $target_File);
            move_uploaded_file($_FILES["Image_book"]["tmp_name"], $target_Image);

            echo '<meta http-equiv="refresh" content="0; \'/OY44/ControlPanel.php?CP=ControlPanel"/>';
        }
    }
}
?>