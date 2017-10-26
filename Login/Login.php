<?php

session_start();

$msg_login = "";
$mysqli = new mysqli('localhost' , 'root' , '' ,'db_iebook_8003115736_v');

if(isset($_POST['btn-login']))
{
    $UserNameLog = $_POST['Username'];
    $passwordLog = md5($_POST['Password']);


    $result = $mysqli->query("SELECT * FROM user WHERE User_Name='$UserNameLog' AND Password='$passwordLog'");

    if ($result->num_rows != 1) {
        $msg_login = '<div class="w3-text-red">The username or password uncorrect</div>';
    } else {
        $_SESSION['user']  = $UserNameLog ;

        if(!empty($_GET['uni'])) {
            header("Location: http://localhost/OY44/index.php?pid=Colleges&uni=$_GET[uni]");
        }else if(!empty($_GET['Serial'])) {
            header("Location: http://localhost/OY44/index.php?pid=Show_Book&Serial=$_GET[Serial]");
        }else{
            header('Location: http://localhost/OY44/index.php?pid=Home');
        }
    }

}
?>

<?php

    if (isset($_SESSION['user'])) {
        echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Home\'"/>';

    } else {
        echo ' <div class="container" style="margin-top: 10%; margin-bottom: 10%">
                    <section id="content">
                        <form action="" method="post" class="sending-form">
                            <h1 style="text-transform: uppercase">Login</h1>
                            <div>
                                <input type="text" name="Username" placeholder="Username" required="" id="username" />
                            </div>
                            <div>
                                <input type="password" name="Password" placeholder="Password" required="" id="password" />
                            </div>
                            <div>' .
                            $msg_login
                            .'</div>
                            <div>
                                <input type="submit" name="btn-login" value="Log in" />
                                <a href="#">Lost your password?</a>
                            </div>
                        </form><!-- form -->
                        <div class="button">
                            if you don\'t have account, please <a href="Registration/Registration.php">Sign up</a>
                        </div><!-- button -->
                    </section><!-- content -->
                </div><!-- container --> ';
    }

?>
