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

$con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

$user = $_SESSION['user'];
$sb = $_GET['Serial'];

$query = "SELECT * FROM book WHERE Serial = '$sb'";
$run = $con->query($query);

while($fetch = $run->fetch_array()) {
    $name_book = $fetch['Name_Book'];
}

?>

<div class='msg_box'>
    <div class="msg_head w3-theme-d2">
        <h3 class="w3-text-white w3-margin-left">Chat - <?= $name_book ?></h3>
    </div>
    <div class="msg_wrap">
        <div class="msg_body">

            <?php
            $color_user = '';
            $query = "SELECT * FROM chat_book WHERE Serial_Book = '$sb'";
            $run = $con->query($query);

            while($fetch = $run->fetch_array()) {

                $name = $fetch['User_Name'];
                $message = $fetch['Message'];

                    $Type_User = $fetch['User_Type'];
                    if($Type_User != 'user'){
                        $color_user = 'red';
                    }

                if ($name == $_SESSION['user']) {
                    echo "<div class='msg_a'>" . $message . "</div>";
                } elseif ($Type_User != 'user'){
                    echo "<div class='msg_b'><b style='color: #0c455d; text-transform: uppercase'>" . $Type_User . " " . "</b>(<b style='color: ".$color_user."'>" . ucwords($name) . "</b>) : " . $message . "</div>";
                }else{
                    echo "<div class='msg_b'><b style='color: ".$color_user."'>" . ucwords($name) . "</b> : " . $message . "</div>";
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

                <input type="text" name="text" id="text" class="msg_input" value="" placeholder="Type your message" >
                <input type="submit" class="w3-btn w3-border w3-theme-d2" name="submit" value="Post">
            </form>
        </div>
    </div>
</div>

