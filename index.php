<?php
require "system/myFunctions.php";
require "system/requestHandel.php";
?>
<!DOCTYPE html>
<html>
<title>My University | <?= $PageID ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/BootStrap.css">
<link rel="stylesheet" href="CSS/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="CSS/Slider_Style.css">
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/assets/skins/sam/skin.css">
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/element/element-min.js"></script>
<script src="http://yui.yahooapis.com/2.8.0r4/build/container/container_core-min.js"></script>
<script src="http://yui.yahooapis.com/2.8.0r4/build/menu/menu-min.js"></script>
<script src="http://yui.yahooapis.com/2.8.0r4/build/button/button-min.js"></script>
<script src="http://yui.yahooapis.com/2.8.0r4/build/editor/editor-min.js"></script>

<style type="text/css">
    .yui-skin-sam .yui-toolbar-container .yui-toolbar-titlebar h2 {
        display: none;}
    .yui-skin-sam .yui-toolbar-container .yui-toolbar-group h3 {
        font-size: 62%; }
</style>

<style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>

<body>

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="index.php?pid=Home" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
        <a href="index.php?pid=Edit_Profile" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
        <div class="w3-dropdown-hover w3-hide-small">
            <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>
            <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                <a href="#" class="w3-bar-item w3-button">One new friend request</a>
                <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
                <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
            </div>
        </div>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Log out"><i class="fa fa-sign-out"></i></a>
        <a href="index.php?pid=Profile" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="Images/Icons/avatar2.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>
        <a href="index.php?pid=Login" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Log in"><i class="fa fa-sign-in"></i></a>
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
    //switch for header
    switch($PageID){
        case "Contact" : include_once "sites_Forum/header.php";
            break;
        case "Home" : include_once "sites_Forum/header.php";
            break;
        case "About" : include_once "sites_Forum/header.php";
            break;
        case "Colleges" : include_once "sites_Forum/header.php";
            break;
        case "Department" : include_once "sites_Forum/header.php";
            break;
        case "Posts" : include_once "sites_Forum/header.php";
            break;
        case "Add_Post" : include_once "sites_Forum/header.php";
            break;
    }

    //switch for main pages
    switch($PageID){
        case "Profile" : include_once "sites_Profile/Profile/Profile.php";
            break;
        case "Contact" : include_once "sites_Forum/Contact/Contact.php";
            break;
        case "About" : include_once "sites_Forum/About/About.php";
            break;
        case "Colleges" : include_once "sites_Forum/Colleges/Colleges.php";
            break;
        case "Login" : include_once "Login/Login.php";
            break;
        case "Sign_up" : include_once "Registration/Registration.php";
            break;
        case "Department" : include_once "sites_Forum/Department/Department.php";
            break;
        case "Posts" : include_once "sites_Forum/Posts/Posts.php";
            break;
        case "Edit_Profile" : include_once "sites_Profile/Edit_Profile/Edit_Profile.php";
            break;
        case "Add_Post" : include_once "sites_Forum/Add_Post/Add_Post.php";
            break;
        default: include_once "sites_Forum/Home/Home.php";
            break;
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

</body>
</html>
