<?php

    if (isset($_SESSION['user'])){

        $Name_University = $_GET['uni'];

        CollegeOprations($Name_University);

    }else{
        header("Location: http://localhost/OY44/index.php?pid=Login&uni=$_GET[uni]");
    }
?>
