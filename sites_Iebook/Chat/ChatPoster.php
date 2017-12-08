<?php


$con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

$Id_User = '';
$User_Type = '';
$Date_Message = date("y-m-d");
    // Secure the Chat


    if(isset($_POST['text']) && isset($_POST['name']) && isset($_POST['Sbook'])){

        $text = strip_tags(strip_tags($_POST['text']));
        $name = strip_tags(strip_tags($_POST['name']));
        $Sbook =strip_tags(strip_tags($_POST['Sbook']));




        if(!empty($text) && !empty($name) && !empty($Sbook)){

            $result_user = $con->query("SELECT * FROM user WHERE User_Name='$name'");
            if($result_user->num_rows > 0){
                while ($row_user = $result_user->fetch_assoc()){
                    $Id_User = $row_user['Id'];
                    $User_Type = $row_user['User_Type'];
                }
            }

            $sql = "INSERT INTO chat_book(User_Name,Message, Date, User_Id,Serial_Book, User_Type) 
             VALUES ('$name','$text', '$Date_Message', '$Id_User','$Sbook', '$User_Type')";

            mysqli_query($con, $sql);




            echo "<li class='cm'><b>".ucwords($name)."</b> - ".$text."</li>";
        }
    }


?>
