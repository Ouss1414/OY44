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
    $target = "../Images/";
    $target_Image = $target . basename($_FILES["Image_Uni"]["name"]);

    $count = '0';
    $Id_uni = '';
    $name_of_uni = $con->real_escape_string($_POST['Name_uni']);
    $Image_Uni = ($_FILES["Image_Uni"]["name"]);
    $Name_college = array();
    for($i = 1; $i<10000; $i++) {
        if (empty($_POST['Name_college'.$i])){
            break;
        }
        $Name_college[$i] = $_POST['Name_college'.$i];
        $count++;
    }

    $sql_uni = "INSERT INTO university (Name, Image) 
            VALUE('$name_of_uni','$Image_Uni')";

    if ($con->query($sql_uni)) {

        move_uploaded_file($_FILES["Image_Uni"]["tmp_name"], $target_Image);

    }

    $result = $con->query("SELECT * FROM university WHERE Name='$name_of_uni'");
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $Id_uni = $row['Id'];
        }
    }

    for($i = 1; $i<= $count; $i++) {
        $sql_college = "INSERT INTO college (Name, University_Id) 
            VALUE('$Name_college[$i]','$Id_uni')";
        if ($con->query($sql_college)) {

            echo '<meta http-equiv="refresh" content="0; \'/OY44/ControlPanel.php?CP=ControlPanel"/>';
        }
    }

}

?>