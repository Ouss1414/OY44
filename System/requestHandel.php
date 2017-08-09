<?php
    if (empty($_GET["pid"])){
        $PageID = "Home";
    }else{
        $PageID = isAuth($_GET["pid"]);
    }

?>