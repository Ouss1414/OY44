<?php


$con = new mysqli('localhost', 'root','' , 'Chat');

    // Secure the Chat

    if(isset($_POST['text']) && isset($_POST['name'])){

        $text = strip_tags(strip_tags($_POST['text']));
        $name = strip_tags(strip_tags($_POST['name']));

        if(!empty($text) && !empty($name)){
           // $sql = "INSERT INTO Messages VALUES ('','$name',$text')";

            $Query = $con->prepare("INSERT INTO `Messages`(`id`, `name`, `message`) 
             VALUES (NULL,'$name','$text')");

            $Query->execute();


            echo "<li class='cm'><b>".ucwords($name)."</b> - ".$text."</li>";
        }
    }


?>
