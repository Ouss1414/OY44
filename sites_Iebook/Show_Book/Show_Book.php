<?php
if (isset($_SESSION['user'])){
    echo '<div class="w3-col">
    ';
        Show_Book();
    echo'
    </div>
    ';
}else{
    header("Location: http://localhost/OY44/index.php?pid=Login&Serial=$_GET[Serial]");
}
?>

