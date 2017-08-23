<?php
if (isset($_SESSION['user'])){

        Profile();

}else{
    header('Location: http://localhost/OY44/index.php?pid=Login');
}

?>
