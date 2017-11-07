<?php
    session_start();
    include_once "../../System/Connect.php";
    require "../../System/myFunctions.php";
    require "../../System/requestHandel.php";
    require '../../System/DBoprations.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My University | Edit Profile </title>
    <meta charset="UTF-8">
    <!-- icon browser -->
    <link rel="icon" href="../../icon.gif">
    <link rel="stylesheet" href="../../CSS/w3-theme-blue-grey.css">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/BootStrap.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="../../index.php?pid=Home" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
        <a href="Edit_Profile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Edit profile"><i class="fa fa-pencil-square-o"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
        <div class="w3-dropdown-hover w3-hide-small">
            <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>
            <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                <a href="#" class="w3-bar-item w3-button">One new friend request</a>
                <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
                <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
            </div>
        </div>
        <a href="../../Login/Logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Log out"><i class="fa fa-sign-out"></i></a>
        <?php getPic(); ?>

    </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>
            <div class="w3-container w3-margin-right w3-margin-left w3-padding-32" style="margin-top: 50px;background-color: #ffffff">

                <h1 style=" margin-left: 10%;text-transform: uppercase;">Edit Profile</h1>

                <hr>
                <?php
                    Edit_Profile();
                ?>
                </div>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
<script src="Edit_validation.js"></script>

</body>
</html>
