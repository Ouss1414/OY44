<?php
session_start();
include_once "../System/Connect.php";
require "../System/myFunctions.php";
require "../System/requestHandel.php";
require '../System/DBoprations.php';

if (isset($_SESSION['user'])) {
    echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Home\'"/>';
}else{
    echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My University | Sign Up </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/w3-theme-blue-grey.css">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/BootStrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="../index.php?pid=Home" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a>
        <a href="../index.php?pid=Login" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Log in"><i class="fa fa-sign-in"></i></a>
    </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

        <div class="container well" style="margin-top: 80px; margin-bottom: 80px">
         
            <form id="register-form" method="post" action="Registration_process.php">
                    <legend style="text-transform: uppercase">Sign up</legend>
        
        <div class="row">
                <div class="form-group col-md-6">
                    <input class="form-control" name="firstName" placeholder="First name" type="text">
                </div>
        
                <div class="form-group col-md-6">
                    <input class="form-control" name="secondName" placeholder="Last name" type="text">
                </div>
        
                <div class="form-group col-md-12">
                    <input class="form-control" name="email" placeholder="Email address - Ex : ( example@example.com )" type="email">
                </div>
        
                <div class="form-group col-md-4">
                    <input class="form-control" name="username" placeholder="User name" type="text">
                </div>
        
                <div class="form-group col-md-4">
                    <input class="form-control" name="phone" placeholder="Phone number" type="text">
                </div>
        
                <div class="form-group col-md-4">
                    <input class="form-control" type="text" name="Academic_Number" placeholder="Academic number" id="Academic_Number" />
                </div>
        
                <div class="clearfix">
                </div>
        
                <div class="form-group col-md-6">
                    <input class="form-control" name="password" id="password" placeholder="Password" type="password">
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" name="password2" placeholder="Re-enter password" type="password">
                </div>
                <div class="clearfix">
                </div>
        
                <div class="form-group col-md-12">
                    <input class="form-control" name="website" placeholder="Website - Ex : ( http://www.example.com )" type="url">
                </div>
        
                <div class="form-group col-md-6">
                    <input class="form-control" type="date" name="Date_of_berth" placeholder="Date of berth" id="Date_of_berth"/>
                </div>
        
                <div class="form-group col-md-6">
                    <select class="form-control" name="country">
                        <optgroup label="Country">
                            <option value="">Choose Country ---</option>
                            <option value="Soudi Arabia">Soudi Arabia</option>
                        </optgroup>
                    </select>
                </div>
        
                <div class="form-group col-md-6">
                    <select class="form-control" name="city">
                        <optgroup label="City" style="width: 200px">
                            <option value="">Choose City ---</option>
                            <option value="Madinah">Madinah</option>
                        </optgroup>
                    </select>
                </div>
                ';
                    select_uni();

                    select_college();

                    select_dep();

        echo '
                <div class="form-group col-md-12">
                    <div style="margin-left: 45px; margin-right: 25px; margin-bottom: 10px">
                        <legend>Gender</legend>
                        <label style="margin-right: 10px"><input type="radio" value="Male" name="gender" id="M_gender" checked required/> Male</label>
                        <label><input type="radio" value="Female" name="gender" id="F_gender" required/> Female</label>
                    </div>
                </div>
        
                <div class="form-group col-md-12">
                    <div class="checkbox">
                        <label>
                            <input id="terms" name="terms" type="checkbox">
                            <i>I have read, consent and agree to Company is User Agreement and Privacy Policy
                            (including the processing and disclosing of my personal data), and I am of
                            legal age. I understand that I can change my communication preferences at any
                                time. Please read the Key Payment and ServiceInformation.</i>
                        </label>
                    </div>
                </div>
                <div>
                    <input class="btn btn-primary" id="submit-button" type="submit" value="Sign Up">
                </div>
        </div>
            </form>
        </div>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
<script src="validation.js"></script>

</body>
</html>
';
}

?>