<?php


$con = new mysqli('localhost', 'root','' , 'chat');


    // Secure the Chat


    if(isset($_POST['text']) && isset($_POST['name']) && isset($_POST['Sbook'])){

        $text = strip_tags(strip_tags($_POST['text']));
        $name = strip_tags(strip_tags($_POST['name']));
        $Sbook =strip_tags(strip_tags($_POST['Sbook']));




        if(!empty($text) && !empty($name) && !empty($Sbook)){




            $sql = "INSERT INTO `Messages`(`name`,`message`,`Sbook`) 
             VALUES ('$name','$text','$Sbook')";

            mysqli_query($con, $sql);




            echo "<li class='cm'><b>".ucwords($name)."</b> - ".$text."</li>";
        }
    }


?>
