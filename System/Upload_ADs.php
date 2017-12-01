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
    $target_Image = $target . basename($_FILES["Image_ADs"]["name"]);

    $Advertiser = $con->real_escape_string($_POST['Advertiser']);
    $Subject_ADs = $con->real_escape_string($_POST['Subject_ADs']);
    $From_Date = $con->real_escape_string($_POST['From_Date']);
    $To_Date = $con->real_escape_string($_POST['To_Date']);
    $Price = $con->real_escape_string($_POST['Price']);
    $Image_ADs = ($_FILES["Image_ADs"]["name"]);

    if(
        !empty($Advertiser) && !ctype_space($Advertiser) &&
        !empty($Subject_ADs) && !ctype_space($Subject_ADs) &&
        !empty($From_Date) && !ctype_space($From_Date) &&
        !empty($To_Date) && !ctype_space($To_Date) &&
        !empty($Price) && !ctype_space($Price)
    ){
        $sql = "INSERT INTO ads (Advertiser, Subject, Ads_From, Ads_To, Price, Image) 
                          VALUE ('$Advertiser','$Subject_ADs', '$From_Date', '$To_Date', '$Price', '$Image_ADs')";

        if ($con->query($sql)) {

            move_uploaded_file($_FILES["Image_ADs"]["tmp_name"], $target_Image);

            echo '<meta http-equiv="refresh" content="0; \'/OY44/ControlPanel.php?CP=ControlPanel"/>';
        }
    }
}
?>