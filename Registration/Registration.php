<?php
if (isset($_SESSION['user'])) {
    echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Home\'"/>';
}else{
    echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My University | Sign Up </title>
    <meta charset="UTF-8">
    <link href="https://bootswatch.com/yeti/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/BootStrap.css">
</head>
<body>
        <div class="container well" style="margin-top: 50px">
        <div class="w3-margin-top w3-margin-left w3-padding-small w3-center w3-hover-text-gray w3-text-blue">
            <a href="../index.php?pid=Home" style="text-transform: uppercase">Home</a> -
            <a href="../index.php?pid=Login" style="text-transform: uppercase">Login</a> 
         </div>
         
            <form id="register-form" method="post" action="Registration_process.php">
                    <legend style="text-transform: uppercase">Sign up</legend>
        
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
                    <input class="form-control" name="phone" placeholder="Phone number" type="tel">
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
                        <option value="null">Choose Country ---</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                    </select>
                </div>
        
                <div class="form-group col-md-6">
                    <select class="form-control" name="city">
                        <option value="null" style="width: 200px">Choose City ---</option>
                        <option value="madinah">Madinah</option>
                    </select>
                </div>
        
                <div class="form-group col-md-6">
                    <select class="form-control" name="university">
                        <option value="null">Choose University ---</option>
                        <option value="taibah">Taibah University</option>
                    </select>
                </div>
        
                <div class="form-group col-md-6">
                    <select class="form-control" name="college">
                        <option value="null">Choose College ---</option>
                        <option value="College of Computer Science and Engineering">College of Computer Science and Engineering</option>
                    </select>
                </div>
        
                <div class="form-group col-md-6">
                    <select class="form-control" name="department">
                        <option value="null">Choose Department ---</option>
                        <option value="CS">CS</option>
                    </select>
                </div>
        
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