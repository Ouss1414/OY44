<?php
if (isset($_SESSION['user'])) {
    echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Home\'"/>';
}else{
    echo '
        <div class="container" style="margin-top: 10%; margin-bottom: 10%">
            <section id="content">
                <form action="Registration/registration_process.php" method="post" id="form_register" name="form_register">
                    <h1 style="text-transform: uppercase">Sign up</h1>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <input type="text" name="Fname" placeholder="First name" id="Fname" />
                        <p id="msg-Fname" style="color: red; font-size: 11px; margin-top: -5px"></p>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <input type="text" name="Lname" placeholder="Last name"  id="Lname" />
                        <p id="msg-Lname" style="color: red; font-size: 11px; margin-top: -5px"></p>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <input type="date" name="Date_of_berth" placeholder="Date of berth" id="Date_of_berth"/>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right" style="margin-left: -10px">*</i>
                        <input type="text" name="username" placeholder="Username" required="" id="username" />
                        <p id="msg-username" style="color: red; font-size: 11px; margin-top: -5px"></p>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right" style="margin-left: -10px">*</i>
                        <input type="text" name="email" placeholder="Email" required="" id="email" />
                        <p id="msg-email" style="color: red; font-size: 11px; margin-top: -5px"></p>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right" style="margin-left: -10px">*</i>
                        <input type="password" name="password" placeholder="Password" required="" id="password" />
                        <p id="msg-password" style="color: red; font-size: 11px; margin-top: -5px"></p>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right" style="margin-left: -10px">*</i>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required="" id="confirm_password" />
                        <p id="msg-confirm-password" style="color: red; font-size: 11px; margin-top: -5px"></p>
                    </div>
                    
                    <div>
                        <fieldset style="margin-left: 45px; margin-right: 25px; margin-bottom: 10px">
                        <legend>Gender</legend>
                        <label style="margin-right: 10px"><input type="radio" value="Male" name="gender" id="M_gender" checked required/> Male</label>
                        <label><input type="radio" value="Female" name="gender" id="F_gender" required/> Female</label>
                        </fieldset>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <select name="country">
                            <option value="null">Choose Country ---</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                        </select>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <select name="city">
                            <option value="null">Choose City ---</option>
                            <option value="madinah">Madinah</option>
                        </select>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <select name="university">
                            <option value="null">Choose University ---</option>
                            <option value="taibah">Taibah University</option>
                        </select>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <select name="college">
                            <option value="null">Choose College ---</option>
                            <option value="College of Computer Science and Engineering">College of Computer Science and Engineering</option>
                        </select>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <select name="department">
                            <option value="null">Choose Department ---</option>
                            <option value="CS">CS</option>
                        </select>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <input type="text" name="Phone_Number" placeholder="Phone Number" id="Phone_Number" />
                        <p id="msg-phone" style="color: red; font-size: 11px; margin-top: -5px"></p>
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <input type="text" name="Academic_Number" placeholder="Academic Number" id="Academic_Number" />
                    </div>
                    
                    <div>
                    <i class="w3-text-red w3-margin-right"></i>
                        <input type="url" name="website" placeholder="Your website" id="website" />
                        <p id="msg-website" style="color: red; font-size: 11px; margin-top: -5px"></p>
                    </div>
                    
                    <div>
                        <input type="submit" name="Sign_up" value="Sgin up" />
                    </div>
                    
                    <div>
                        <input type="reset" name="reset" value="Reset" />
                    </div>
                    
                </form><!-- form -->
                <div class="button">
                    if you have account, please <a href="index.php?pid=Login">Login</a>
                </div><!-- button -->
            </section><!-- content -->
        </div><!-- container -->
    ';
}

?>
