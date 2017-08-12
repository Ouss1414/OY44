<?php

session_start();

$mysqli = new mysqli('localhost' , 'root' , '' ,'iebook');

if(isset($_POST['btn-login']))
{
    $UserNameLog = $_POST['Username'];
    $passwordLog = md5($_POST['Password']);


    $result = $mysqli->query("SELECT * FROM user WHERE User_Name='$UserNameLog' AND Password='$passwordLog'");

    if ($result->num_rows == 0) {
        echo " <script> alert('wrong details');</script > ";
    } else {
        $_SESSION['user']  = $UserNameLog ;

        header('Location: http://localhost/OY44/');
    }

}
?>

<?php

    if (isset($_SESSION['user'])) {
        echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Home\'"/>';

    } else {
        echo ' <div class="container" style="margin-top: 10%; margin-bottom: 10%">
                    <section id="content">
                        <form action="Login/Login.php" method="post" class="sending-form">
                            <h1 style="text-transform: uppercase">Login</h1>
                            <div>
                                <input type="text" name="Username" placeholder="Username" required="" id="username" />
                            </div>
                            <div>
                                <input type="password" name="Password" placeholder="Password" required="" id="password" />
                            </div>
                            <div>
                                <input type="submit" name="btn-login" value="Log in" />
                                <a href="#">Lost your password?</a>
                            </div>
                        </form><!-- form -->
                        <div class="button">
                            if you don\'t have account, please <a href="index.php?pid=Sign_up">Sign up</a>
                        </div><!-- button -->
                    </section><!-- content -->
                </div><!-- container --> ';
    }

?>
