<?php

    if (isset($_SESSION['user'])){

        $Name_University = $_GET['uni'];

        CollegeOprations($Name_University);

    }else{
        echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Login&uni='.$_GET['uni'].'\'"/>';
    }
?>
