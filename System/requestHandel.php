<?php
    if (empty($_GET["pid"])){
        $PageID = "Home";
    }else{
        $PageID = isAuth($_GET["pid"]);
    }

    if (empty($_GET["CP"])){
        $Pages = "ControlPanel";
    }else{
        $Pages = ControlPanel($_GET["CP"]);
    }

?>