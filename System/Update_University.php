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

    $real_name_uni = $_POST['real_name_uni'];
    $Name_uni = $con->real_escape_string($_POST['Name_uni']);
    $Image_uni = ($_FILES["Image_Uni"]["name"]);


    if( !empty($Name_uni) && !ctype_space($Name_uni)
    ){
        $sql = "UPDATE university set Name= '$Name_uni',
                                Image= '$Image_uni'
                                 WHERE Name='$real_name_uni'";

        if ($con->query($sql)) {

            if(!empty($Image_uni)){
                move_uploaded_file($_FILES["Image_Uni"]["tmp_name"], $target_Image);
            }
            echo '<meta http-equiv="refresh" content="0; \'/OY44/ControlPanel.php?CP=Update_University&uni='.$Name_uni.'"/>';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>