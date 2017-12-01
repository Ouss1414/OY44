<?php
session_start();
include_once "System/Connect.php";
require "system/myFunctions.php";
require "system/requestHandel.php";
require "System/DBoprations.php";

$Blocked = '';
if (!empty($_SESSION['user'])) {
    $result_user = $con->query("SELECT * FrOM user WHERE User_Name='$_SESSION[user]'");
    if ($result_user->num_rows > 0) {
        while ($row_user = $result_user->fetch_assoc()) {
            $Blocked = $row_user['Block_User'];
        }
    }
}

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>My University | <?= $PageID ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- icon browser -->
        <link rel="icon" href="icon.gif">

        <link rel="stylesheet" href="CSS/BootStrap.css">
        <link rel="stylesheet" href="CSS/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/Slider_Style.css">
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/assets/skins/sam/skin.css">
        <script type="text/javascript"
                src="http://yui.yahooapis.com/2.8.0r4/build/yahoo-dom-event/yahoo-dom-event.js"></script>
        <script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/element/element-min.js"></script>
        <script src="http://yui.yahooapis.com/2.8.0r4/build/container/container_core-min.js"></script>
        <script src="http://yui.yahooapis.com/2.8.0r4/build/menu/menu-min.js"></script>
        <script src="http://yui.yahooapis.com/2.8.0r4/build/button/button-min.js"></script>
        <script src="http://yui.yahooapis.com/2.8.0r4/build/editor/editor-min.js"></script>
        <?php
        if (isset($_SESSION['user'])) {
            echo '
            <script>
                var t;
                document.onmousemove=to
                document.onkeypress=to
                function logout()
                {
                    location.href=\'Login/Logout.php\'
                }
                function to(){
                    clearTimeout(t);
                    t=setTimeout(logout,300000)//logs out in 1 minutes
                }
            </script>
        ';
        }
        ?>
    </head>


    <style type="text/css">
        .yui-skin-sam .yui-toolbar-container .yui-toolbar-titlebar h2 {
            display: none;
        }

        .yui-skin-sam .yui-toolbar-container .yui-toolbar-group h3 {
            font-size: 62%;
        }
    </style>

    <style>
        html, body, h1, h2, h3, h4, h5 {
            font-family: "Open Sans", sans-serif
        }
    </style>

    <body>
    <!-- test -->
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
               href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="index.php?pid=Home" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i
                        class="fa fa-home w3-margin-right"></i>Home</a>
            <?php
            login();
            ?>
        </div>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
    </div>

    <!-- Switchs -->

    <?php
if(empty($_SESSION['user']) || !empty($_SESSION['user']) && $Blocked == '0') {

    //switch for header
    switch ($PageID) {
        case "Contact" :
            include_once "header.php";
            break;
        case "Home" :
            include_once "header.php";
            break;
        case "About" :
            include_once "header.php";
            break;
        case "Colleges" :
            include_once "header.php";
            break;
        case "Department" :
            include_once "header.php";
            break;
        case "Posts" :
            include_once "header.php";
            break;
        case "Add_Post" :
            include_once "header.php";
            break;
        case "Show_Book" :
            include_once "header.php";
            break;
        case "IEBook" :
            include_once "header.php";
            break;
        case "Questions_Page" :
            include_once "header.php";
            break;
        case "Answer_Question" :
            include_once "header.php";
            break;
    }

    //switch for main pages
    switch ($PageID) {
        case "Profile" :
            include_once "sites_Profile/Profile/Profile.php";
            break;
        case "Contact" :
            include_once "sites_Forum/Contact/Contact.php";
            break;
        case "About" :
            include_once "sites_Forum/About/About.php";
            break;
        case "Colleges" :
            include_once "sites_Forum/Colleges/Colleges.php";
            break;
        case "Login" :
            include_once "Login/Login.php";
            break;
        case "Department" :
            include_once "sites_Forum/Department/Department.php";
            break;
        case "Posts" :
            include_once "sites_Forum/Posts/Posts.php";
            break;
        case "Add_Post" :
            include_once "sites_Forum/Add_Post/Add_Post.php";
            break;
        case "Show_Book" :
            include_once "sites_Iebook/Show_Book/Show_Book.php";
            break;
        case "IEBook" :
            include_once "sites_Iebook/Home/Home.php";
            break;
        case "Delete" :
            include_once "System/Delete.php";
            break;
        case "Questions_Page" :
            include_once "sites_Iebook/Questions_Page/Questions_Page.php";
            break;
        case "Answer_Question" :
            include_once "sites_Iebook/Questions_Page/Answer_Question.php";
            break;
        case "Favorite" :
            include_once "sites_Profile/Favorite/Favorite.php";
            break;
        default:
            include_once "sites_Forum/Home/Home.php";
            break;
    }
} else {
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 10%;" align="center">Sorry, You are <i STYLE="color: red">Blocked</i>,
 You don\'t have permission to access this wibsite.</div>';
    include_once "sites_Forum/Contact/Contact.php";
}
    ?>
    <!-- Footer -->

    <footer class="w3-container w3-theme-d5 w3-center" style="margin-top: 50px">
        <p>Powered by <a href="#" target="_blank">Ready Team</a></p>
    </footer>

    <script>
        // Accordion
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-theme-d1";
            } else {
                x.className = x.className.replace("w3-show", "");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-theme-d1", "");
            }
        }

        // Used to toggle the menu on smaller screens when clicking on the menu button
        function openNav() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="JS/JS_Slider.js"></script>
    <script src="System/delete.js"></script>
    <script src="System/Add_Post_Profile.js"></script>
    <script src="System/Like_or_Dislike_Post.js"></script>
    <script src="System/Contact.js"></script>
    <script src="System/favorite.js"></script>

    </body>
    </html>
