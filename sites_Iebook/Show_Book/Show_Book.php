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

<?php

$user = $_SESSION['user'];
$sb = $_GET['Serial'];


?>

<div class='chatContainer'>
    <div class="chatHeader">
        <h3>Welcome <?php echo ucwords($user); ?>   </h3>


    </div>
    <div class="chatMessages">

        <?php

        $con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

        $query = "SELECT * FROM chat_book WHERE Serial_Book = '$sb'";
        $run = $con->query($query);

        while($fetch = $run->fetch_array()) {

            $name = $fetch['User_Name'];
            $message = $fetch['Message'];

            if ($name == $_SESSION['user']) {
                echo "<div class='cm1'>" . $message . "</div>";
            } else {
                echo "<div class='cm2'><b>" . ucwords($name) . "</b> - " . $message . "</div>";
            }

        }
        ?>

        <form style="display: none">
            <input type="hidden" id="Sbook" value="<?php echo $sb;?>">
        </form>

    </div>
    <hr class="w3-border w3-light-gray w3-margin-right w3-margin-left">
    <div class="chatBottom">
        <form action="#" onsubmit="return false;" class="chatForm" enctype="multipart/form-data">

            <input type="hidden" id="name" value="<?php echo $user ?>" >

            <input type="hidden" id="Sbook" value="<?php echo $sb ?>" >

            <input type="text" name="text" id="text" value="" placeholder="Type your message" >
            <input type="submit" name="submit" value="Post">
        </form>
    </div>
</div>

