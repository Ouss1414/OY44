<?php

function Favorite(){
    $Name_User = $_SESSION['user'];

    if ($_GET['user'] == $_SESSION['user']) {

    $con = new mysqli('localhost', 'root', '', 'db_iebook_8003115736_v');

    $Id_User = '';
    $Id_Book = '';

//User
    $sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {
            $Id_User = $row_User['Id'];
            echo '
<!-- Middle Column -->
<div class="Book w3-col s7" style="margin-left: -2%; margin-right: 2%">
    <ul>
';
            //Favorite
            $sql_favorite = "SELECT * FROM favorite_book WHERE User_Id=$Id_User";
            $result_favorite = $con->query($sql_favorite);
            if ($result_favorite->num_rows > 0) {
                while ($row_favorite = $result_favorite->fetch_assoc()) {
                    $Id_Book_Favorite = $row_favorite['Book_Id'];

                    //book
                    $sql_book = "SELECT * FROM book,user WHERE Id_Book=$Id_Book_Favorite AND User_Id=Id";
                    $result_book = $con->query($sql_book);
                    if ($result_book->num_rows > 0) {
                        while ($row_book = $result_book->fetch_assoc()) {
                            $Id_Book = $row_book['Id_Book'];
                            echo '
            <div class="w3-container w3-card-2 w3-padding-small w3-col" style="max-width: 235px; margin-left: 1%; margin-top: -1.7%; margin-bottom: 5%">
                                    <li>
                                        <div class="s-product" style="width:155px;">
                                            <div class="s-product-img">
                                                <img src="Upload_Books/' . $row_book['Image_Book'] . '" alt="" width="100%" height="217">
                                                <div class="s-product-hover">
                                                    <ul>
                      <li><a class="UnFavorite" title="Un Favorite" value="' . $Id_Book . '" name="' . $Id_User . '"><i class="fa fa-heart w3-text-red"></i></a></li>
                                                        <li><a href="index.php?pid=Show_Book&Serial=' . $row_book['Serial'] . '"><i class="fa fa-book"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="s-product-tooltip">
                                                    <ul class="book-detail-list" style="margin-left: -40px; margin-bottom: -20px">
                                                        <li style="display: inline;">' . $row_book['Name_Book'] . '</li><li style="display: inline; color:darkgray;"> |  Price: <span>$</span>' . $row_book['Price'] . '</li>
                                                        <li>Writed by : <span class="theme-color">' . $row_book['First_Name'] . " " . $row_book['Last_Name'] . '</span></li>
                                                        <li>Pages : <span>' . $row_book['Page'] . '</span></li>
                                                    </ul>
                                                    <p>Summary : <span>' . $row_book['Summary'] . '</span></p>
                                                    <ul class="rating-stars" style="display: flex">
                                                        <li><span>Rating: </span> </li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star-half-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h6><a href="">' . $row_book['Name_Book'] . '</a></h6>
                                            <span>' . $row_book['First_Name'] . " " . $row_book['Last_Name'] . '</span>
                                        </div>
                                    </li>
                                </div>
    ';
                        }
                    }
                }
            } else {
                echo '
                    <div class="w3-col w3-round w3-card-2 w3-white w3-xlarge w3-text-red" align="center" style="min-height: 300px; margin-top: -1.7%; min-width: 101.5%">
                        <p class="w3-padding-64">You don\'t have any favorite book.</p>
                        <a class="w3-button w3-green" style="text-decoration: none" href="index.php?pid=IEBook">Go Books</a>
                    </div>
                ';
            }
            echo '
    </ul>
</div>
<!-- End Middle Column -->
';

        }
    }
} else {
    echo '<meta http-equiv="refresh" content="0; \'index.php?pid=Profile&user='.$Name_User.'\'"/>';
}

}

function Following(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $Name_User = $_GET['user'];

//User
    $sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {
            echo '
    <!-- Middle Column -->
    <div class="w3-col s7">
    ';

            $result_followers = $con->query("SELECT * FROM followers WHERE User_Id=$row_User[Id] AND Status='approve'");
            if ($result_followers->num_rows > 0) {
                while ($row_followers = $result_followers->fetch_assoc()) {
                    $sql_User_F = "SELECT * FROM user WHERE Id=$row_followers[Following]";
                    $result_user_F = $con->query($sql_User_F);
                    if ($result_user_F->num_rows > 0) {
                        while ($row_User_F = $result_user_F->fetch_assoc()) {
                            if (empty($row_User_F['Image'])) {
                                $row_User_F['Image'] = 'defult.png';
                            }
                            echo '
        <div class="w3-container w3-card-2 w3-white w3-padding-small w3-col" style="max-width: 170px; margin-left: 2%; margin-bottom: 5%">
           <a style="cursor: pointer; text-decoration: none" onclick="location.href=\'index.php?pid=Profile&user=' . $row_User_F['User_Name'] . '\'">
                <div class="w3-center w3-padding-16">
                   <img src="Images/Pic/' . $row_User_F['Image'] . '" width="100px" height="100px" class="w3-circle">
                   <p>' . $row_User_F['User_Name'] . '</p>
                   ';
                            if($_GET['user'] == $_SESSION['user']) {
                                echo '
                   <a class="Unfollow w3-btn w3-border" name="Unfollow" id="' . $row_followers['Id'] . '">Unfollow</a>
                   ';
                            }
                            echo '
                </div>
           </a>
        </div>
        ';
                        }
                    }
                }
            } else {
                echo '
                    <div class="w3-col w3-round w3-card-2 w3-white w3-xlarge w3-text-red" align="center" style="margin-left: 2%; min-height: 300px; max-width: 96%">
                        <p class="w3-padding-64">Has no Following.</p>
                    </div>
                ';
            }
        }
    }
    echo '
    </div>
    <!-- End Middle Column -->
';

}

function Followers(){
$con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $Name_User = $_GET['user'];

//User
    $sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {
            echo '
    <!-- Middle Column -->
    <div class="w3-col s7">
    ';

            $result_followers = $con->query("SELECT * FROM followers WHERE Following=$row_User[Id] AND Status='approve'");
            if ($result_followers->num_rows > 0) {
                while ($row_followers = $result_followers->fetch_assoc()) {
                    $sql_User_F = "SELECT * FROM user WHERE Id=$row_followers[User_Id]";
                    $result_user_F = $con->query($sql_User_F);
                    if ($result_user_F->num_rows > 0) {
                        while ($row_User_F = $result_user_F->fetch_assoc()) {
                            if (empty($row_User_F['Image'])) {
                                $row_User_F['Image'] = 'defult.png';
                            }
                            echo '
        <div class="w3-container w3-card-2 w3-white w3-padding-small w3-col" style="max-width: 170px; margin-left: 2%; margin-bottom: 5%">
           <a style="cursor: pointer; text-decoration: none" onclick="location.href=\'index.php?pid=Profile&user=' . $row_User_F['User_Name'] . '\'">
                <div class="w3-center w3-padding-16">
                   <img src="Images/Pic/' . $row_User_F['Image'] . '" width="100px" height="100px" class="w3-circle">
                   <p>' . $row_User_F['User_Name'] . '</p>
                </div>
           </a>
        </div>
        ';
                        }
                    }
                }
            } else {
                echo '
                    <div class="w3-col w3-round w3-card-2 w3-white w3-xlarge w3-text-red" align="center" style="margin-left: 2%; min-height: 300px; max-width: 96%">
                        <p class="w3-padding-64">Has no Followers.</p>
                    </div>
                ';
            }
        }
    }
    echo '
    </div>
    <!-- End Middle Column -->
';
}

function select_dep(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_iebook_8003115736_v";

    $con = new mysqli($servername, $username, $password, $dbname);

    echo '
                <div class="form-group col-md-6">
                    <select class="form-control" name="department">
                        <optgroup label="Department">
                            <option value="">Choose Department ---</option>
                            ';
    //department
    $sql_dep = "SELECT * FROM department";
    $result_dep = $con->query($sql_dep);
    if ($result_dep->num_rows > 0){
        while ($row_dep = $result_dep->fetch_assoc()) {
            echo '                   
                           <option value="'.$row_dep['Name'].'">'.$row_dep['Name'].'</option>
                 ';
        }
    }
    echo '
                        </optgroup>
                    </select>
                </div>
        ';

}

function select_college(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_iebook_8003115736_v";

    $con = new mysqli($servername, $username, $password, $dbname);

    echo '
<div class="form-group col-md-6">
     <select class="form-control" name="college">
           <optgroup label="College">
                 <option value="">Choose College ---</option>
                            
                            ';
    //college
    $sql_college = "SELECT * FROM college";
    $result_college = $con->query($sql_college);
    if ($result_college->num_rows > 0){
        while ($row_college = $result_college->fetch_assoc()) {
            echo '
                <option value="'.$row_college['Name'].'">'.$row_college['Name'].'</option>
                            ';
        }
    }
    echo '
        </optgroup>
    </select>
 </div>
                ';
}

function select_uni(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_iebook_8003115736_v";

    $con = new mysqli($servername, $username, $password, $dbname);

    echo '
        <div class="form-group col-md-6">
                    <select class="form-control" name="university">
                        <optgroup label="University">
                            <option value="">Choose University ---</option>
    ';
    //university
    $sql_uni = "SELECT * FROM university";
    $result_uni = $con->query($sql_uni);
    if ($result_uni->num_rows > 0){
        while ($row_uni = $result_uni->fetch_assoc()){
            echo '
        
               <option value="'.$row_uni['Name'].'">'.$row_uni['Name'].'</option>
                      
            ';
        }
    }
    echo '
                        </optgroup>
                    </select>
                </div>
    ';
}

function ControlPanel_head(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $UserName = $_SESSION['user'];

    //user
    $sql_user = "SELECT * FROM user WHERE User_Name= '$UserName'";
    $result_user = $con->query($sql_user);
    if ($result_user->num_rows > 0){
        while ($row_user = $result_user->fetch_assoc()){
            $user_name = $row_user['User_Name'];

            echo '
        <div class="row">

            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix">

                <ul class="user-info pull-left pull-none-xsm">

                    <!-- Profile Info -->
                    <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        ';
                        if (empty($row_user['Image'])){
                            $row_user['Image'] = 'defult.png';
                        }
                        echo '
                            <img src="Images/Pic/'.$row_user['Image'].'" alt="" class="img-circle" width="44" />
                            '.$row_user['First_Name']. " " . $row_user['Last_Name'] .'
                        </a>

                        <ul class="dropdown-menu">

                            <!-- Reverse Caret -->
                            <li class="caret"></li>

                            <li>
                                <a href="ControlPanel/Mail/Mailbox/mailbox.html">
                                    <i class="entypo-mail"></i>
                                    Inbox
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="entypo-clipboard"></i>
                                    Tasks
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>

                <ul class="user-info pull-left pull-right-xs pull-none-xsm">

                    <!-- Message Notifications -->
                    <li class="notifications dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-mail"></i>
                            <span class="badge badge-secondary">10</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <form class="top-dropdown-search">

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search anything..." name="s" />
                                    </div>

                                </form>

                                <ul class="dropdown-menu-list scroller">
                                    <li class="active">
                                        <a href="#">
											<span class="image pull-right">
												<img src="ControlPanel/assets/images/thumb-1@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                            <span class="line">
												<strong>Luc Chartier</strong>
												- yesterday
											</span>

                                            <span class="line desc small">
												This ain’t our first item, it is the best of the rest.
											</span>
                                        </a>
                                    </li>

                                    <li class="active">
                                        <a href="#">
											<span class="image pull-right">
												<img src="ControlPanel/assets/images/thumb-2@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                            <span class="line">
												<strong>Salma Nyberg</strong>
												- 2 days ago
											</span>

                                            <span class="line desc small">
												Oh he decisively impression attachment friendship so if everything.
											</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
											<span class="image pull-right">
												<img src="ControlPanel/assets/images/thumb-3@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                            <span class="line">
												Hayden Cartwright
												- a week ago
											</span>

                                            <span class="line desc small">
												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
											</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
											<span class="image pull-right">
												<img src="ControlPanel/assets/images/thumb-4@2x.png" width="44" alt="" class="img-circle" />
											</span>

                                            <span class="line">
												Sandra Eberhardt
												- 16 days ago
											</span>

                                            <span class="line desc small">
												On so attention necessary at by provision otherwise existence direction.
											</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="external">
                                <a href="ControlPanel.php?CP=mailbox">All Messages</a>
                            </li>
                        </ul>

                    </li>

                    <!-- Task Notifications -->
                    <li class="notifications dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-list"></i>
                            <span class="badge badge-warning">1</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="top">
                                <p>You have 6 pending tasks</p>
                            </li>

                            <li>
                                <ul class="dropdown-menu-list scroller">
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">Procurement</span>
												<span class="percent">27%</span>
											</span>

                                            <span class="progress">
												<span style="width: 27%;" class="progress-bar progress-bar-success">
													<span class="sr-only">27% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">App Development</span>
												<span class="percent">83%</span>
											</span>

                                            <span class="progress progress-striped">
												<span style="width: 83%;" class="progress-bar progress-bar-danger">
													<span class="sr-only">83% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">HTML Slicing</span>
												<span class="percent">91%</span>
											</span>

                                            <span class="progress">
												<span style="width: 91%;" class="progress-bar progress-bar-success">
													<span class="sr-only">91% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">Database Repair</span>
												<span class="percent">12%</span>
											</span>

                                            <span class="progress progress-striped">
												<span style="width: 12%;" class="progress-bar progress-bar-warning">
													<span class="sr-only">12% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">Backup Create Progress</span>
												<span class="percent">54%</span>
											</span>

                                            <span class="progress progress-striped">
												<span style="width: 54%;" class="progress-bar progress-bar-info">
													<span class="sr-only">54% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
											<span class="task">
												<span class="desc">Upgrade Progress</span>
												<span class="percent">17%</span>
											</span>

                                            <span class="progress progress-striped">
												<span style="width: 17%;" class="progress-bar progress-bar-important">
													<span class="sr-only">17% Complete</span>
												</span>
											</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="external">
                                <a href="#">See all tasks</a>
                            </li>
                        </ul>

                    </li>

                </ul>

            </div>


            <!-- Raw Links -->
            <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                <ul class="list-inline links-list pull-right">

                    <!-- Language Selector -->
                    <li class="dropdown language-selector">

                        Language: &nbsp;
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                            <img src="ControlPanel/assets/images/flags/flag-uk.png" width="16" height="16" />
                        </a>

                        <ul class="dropdown-menu pull-right">
                            <li class="active">
                                <a href="#">
                                    <img src="ControlPanel/assets/images/flags/flag-uk.png" width="16" height="16" />
                                    <span>English</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="ControlPanel/assets/images/flags/flag-sa.png" width="16" height="16" />
                                    <span>Arabic</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="sep"></li>


                    <li>
                        <a href="#" data-toggle="chat" data-collapse-sidebar="1">
                            <i class="entypo-chat"></i>
                            Chat

                            <span class="badge badge-success chat-notifications-badge is-hidden">0</span>
                        </a>
                    </li>

                    <li class="sep"></li>

                    <li>
                        <a href="Login/Logout.php">
                            Log Out <i class="entypo-logout right"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    ';
        }
    }
}

function Edit_Book(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $user_name = $_SESSION['user'];

//user
    $User_type = '';
    $sql = "SELECT * FROM user WHERE User_Name='$user_name'";
    $result_user = $con->query($sql);
    if ($result_user->num_rows > 0) {
        while ($row_user = $result_user->fetch_assoc()) {
            $User_type = $row_user['User_Type'];
        }
    }

    if($User_type == 'author'){
        $sbook = '';
        $sql = "SELECT * FROM book";
        $result_Book = $con->query($sql);
        if ($result_Book->num_rows > 0) {
            while ($row_book = $result_Book->fetch_assoc()) {
                if ($_GET['Serial'] == $row_book['Serial']){
                    $sbook = $row_book['Serial'];
                }
            }
        }


        if (!empty($_GET['Serial'] && $_GET['Serial'] == $sbook)) {

            $Serial_Book = $_GET['Serial'];

            //book
            $sql = "SELECT * FROM book WHERE Serial='$Serial_Book'";
            $result_Book = $con->query($sql);
            if ($result_Book->num_rows > 0) {
                while ($row_book = $result_Book->fetch_assoc()) {
                    echo '
            <div class="row" align="center">
                <h2 class="margin-bottom">Edit Book (<i style="color: #00a65a;">' . $row_book['Name_Book'] . '</i>)</h2>
                <form action="System/Update_Book.php" method="post" enctype="multipart/form-data">
                    <table class="table" style="max-width: 60%">
                    <input type="text" style="display: none" name="Serial" value="' . $row_book['Serial'] . '">
                        <tr>
                            <td><label for="Serial"><span style="color: red">*</span> Serial book: </label></td>
                            <td><input type="text" class="form-control" name="New_Serial" value="' . $row_book['Serial'] . '" placeholder="Serial number" required></td>
                        </tr>
            
                        <tr>
                            <td><label for="Name_book"><span style="color: red">*</span> Name book: </label></td>
                            <td><input type="text" class="form-control" name="Name_book" value="' . $row_book['Name_Book'] . '" placeholder="Name book" required></td>
                        </tr>
            
                        <tr>
                            <td><label for="Page_book"  ><span style="color: red">*</span> Pages: </label></td>
                            <td><input type="number" class="form-control" name="Page_book" value="' . $row_book['Page'] . '" placeholder="Number only"  required></td>
                        </tr>
            
                        <tr>
                            <td><label for="Price_book"  ><span style="color: red">*</span> Price: </label></td>
                            <td>
                                <input type="number" class="form-control" name="Price_book" value="' . $row_book['Price'] . '" placeholder="Free">
                                <p style="color: red">* If it\'s FREE please don\'t add a value.</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><label for="Catagories_book"  ><span style="color: red">*</span> Catagories: </label></td>
                            <td><select class="form-control" name="catagories_book">
                                    <option>Choose one...</option>
                                    ';
                    select_catagories($row_book['Catagories']);
                    echo '
                                </select>
                            </td>
                        </tr>
            
                        ';
                    if ($row_book['Available'] == '1') {
                        $checked_true = 'checked';
                        $checked_false = '';
                    } else {
                        $checked_true = '';
                        $checked_false = 'checked';
                    }
                    echo '
                        <tr>
                            <td><label for="Available_book"><span style="color: red">*</span> Available book: </label></td>
                            <td><label><input type="radio" value="1" name="Available_book" ' . $checked_true . ' required> Yes</label></br>
                                <label><input type="radio" value="0" name="Available_book" ' . $checked_false . ' required> No</label></td>
                        </tr>
            
                        <tr>
                            <td><label for="File_book"><span style="color: red">*</span> File book: </label></td>
                            <td><div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                        <div style="margin-top: 30%; font-size: 24px">Click Here</div>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select File</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="File_book" accept="application/pdf">
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                                <p style="color: red;">* Only files [PDF].</p>
                            </td>
                        </tr>
            
                        <tr>
                            <td><label for="Image_book"><span style="color: red">*</span> Image book: </label></td>
                            <td><div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                        <img src="http://placehold.it/200x150" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="Image_book" accept="image/*">
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            <p style="color: red;">* Only images [JPG,JPEG,JPG2,PNG,GIF].</p>
                            </td>
                        </tr>
            
                        <tr>
                            <td><label for="Summary_book"  >Summary: </label></td>
                            <td><textarea class="form-control" name="Summary_book" placeholder="Summary" rows="5" style="resize: none" >' . $row_book['Summary'] . '</textarea></td>
                        </tr>
            
                    </table>
            
                    <div align="center">
                        <input type="submit" value="Update" name="Update_book" class="btn btn-green"/>
                        <input type="reset" value="Reset" name="reset_book" class="btn btn-red margin-left"/>
                    </div>
                </form>
            </div>
    ';
                }
            }
        } else {
            echo '
        <script>location.href="ControlPanel.php?CP=Manage_Books"</script>
        ';
        }
    }

    if ($User_type == 'admin') {

            echo '
				     <table class="table" style="max-width: 70%">
                        <tr>
                            <td><label for="Serial_Book"><span style="color: red">*</span> Choose Book: </label></td>
                            <td>
                                <select name="Serial_Book" class="form-control" id="Serial_Book" onchange="location.href=\'ControlPanel.php?CP=Admin_Update_Book&Serial=\'+this.value">
                                <option value="">Choose Book</option>
            ';
            $result_book = $con->query("SELECT * FROM book");
            if ($result_book->num_rows > 0) {
                while ($row_book = $result_book->fetch_assoc()) {
                    if($_GET['Serial'] == $row_book['Serial']){
                        echo '
                              <option selected value="' . $row_book['Serial'] . '">' . $row_book['Name_Book'] . '</option>
                            ';
                    }else {
                        echo '
                              <option value="' . $row_book['Serial'] . '">' . $row_book['Name_Book'] . '</option>
                            ';
                    }
                }
            }
            echo '
                                </select>
                            </td>
                        </tr>
                    </table>
            ';

        if(!empty($_GET['Serial'])) {

            $sbook = '';
            $sql = "SELECT * FROM book";
            $result_Book = $con->query($sql);
            if ($result_Book->num_rows > 0) {
                while ($row_book = $result_Book->fetch_assoc()) {
                    if ($_GET['Serial'] == $row_book['Serial']) {
                        $sbook = $row_book['Serial'];
                    }
                }
            }


            if (!empty($_GET['Serial'] && $_GET['Serial'] == $sbook)) {

                $Serial_Book = $_GET['Serial'];

                //book
                $sql = "SELECT * FROM book WHERE Serial='$Serial_Book'";
                $result_Book = $con->query($sql);
                if ($result_Book->num_rows > 0) {
                    while ($row_book = $result_Book->fetch_assoc()) {
                        echo '
            <div class="row" align="center">
                <h2 class="margin-bottom">Edit Book (<i style="color: #00a65a;">' . $row_book['Name_Book'] . '</i>)</h2>
                <form action="System/Admin_Update_Book.php" method="post" enctype="multipart/form-data">
                    <table class="table" style="max-width: 60%">
                    <input type="text" style="display: none" name="Serial" value="' . $row_book['Serial'] . '">
                        <tr>
                            <td><label for="Serial"><span style="color: red">*</span> Serial book: </label></td>
                            <td><input type="text" class="form-control" name="New_Serial" value="' . $row_book['Serial'] . '" placeholder="Serial number" required></td>
                        </tr>
            
                        <tr>
                            <td><label for="Name_book"><span style="color: red">*</span> Name book: </label></td>
                            <td><input type="text" class="form-control" name="Name_book" value="' . $row_book['Name_Book'] . '" placeholder="Name book" required></td>
                        </tr>
            
                        <tr>
                            <td><label for="Page_book"  ><span style="color: red">*</span> Pages: </label></td>
                            <td><input type="number" class="form-control" name="Page_book" value="' . $row_book['Page'] . '" placeholder="Number only"  required></td>
                        </tr>
            
                        <tr>
                            <td><label for="Price_book"  ><span style="color: red">*</span> Price: </label></td>
                            <td>
                                <input type="number" class="form-control" name="Price_book" value="' . $row_book['Price'] . '" placeholder="Free">
                                <p style="color: red">* If it\'s FREE please don\'t add a value.</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><label for="Catagories_book"  ><span style="color: red">*</span> Catagories: </label></td>
                            <td><select class="form-control" name="catagories_book">
                                    <option>Choose one...</option>
                                    ';
                        select_catagories($row_book['Catagories']);
                        echo '
                                </select>
                            </td>
                        </tr>
            
                        ';
                        if ($row_book['Available'] == '1') {
                            $checked_true = 'checked';
                            $checked_false = '';
                        } else {
                            $checked_true = '';
                            $checked_false = 'checked';
                        }
                        echo '
                        <tr>
                            <td><label for="Available_book"><span style="color: red">*</span> Available book: </label></td>
                            <td><label><input type="radio" value="1" name="Available_book" ' . $checked_true . ' required> Yes</label></br>
                                <label><input type="radio" value="0" name="Available_book" ' . $checked_false . ' required> No</label></td>
                        </tr>
            
                        <tr>
                            <td><label for="File_book"><span style="color: red">*</span> File book: </label></td>
                            <td><div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                        <div style="margin-top: 30%; font-size: 24px">Click Here</div>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select File</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="File_book" accept="application/pdf">
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                                <p style="color: red;">* Only files [PDF].</p>
                            </td>
                        </tr>
            
                        <tr>
                            <td><label for="Image_book"><span style="color: red">*</span> Image book: </label></td>
                            <td><div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                        <img src="http://placehold.it/200x150" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="Image_book" accept="image/*">
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            <p style="color: red;">* Only images [JPG,JPEG,JPG2,PNG,GIF].</p>
                            </td>
                        </tr>
            
                        <tr>
                            <td><label for="Summary_book"  >Summary: </label></td>
                            <td><textarea class="form-control" name="Summary_book" placeholder="Summary" rows="5" style="resize: none" >' . $row_book['Summary'] . '</textarea></td>
                        </tr>
            
                    </table>
            
                    <div align="center">
                        <input type="submit" value="Update" name="Update_book" class="btn btn-green"/>
                        <input type="reset" value="Reset" name="reset_book" class="btn btn-red margin-left"/>
                    </div>
                </form>
            </div>
    ';
                    }
                }
            } else {
                echo '
        <script>location.href="ControlPanel.php?CP=Manage_Books"</script>
        ';
            }
        }
    }
}

function select_catagories($Catagiries){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    //book
    $sql = "SELECT distinct Catagories FROM book";
    $result_Book = $con->query($sql);
    if ($result_Book->num_rows > 0) {
        while ($row_book = $result_Book->fetch_assoc()) {

            if ($Catagiries == $row_book['Catagories']){
                echo '
                <option selected value="'.$row_book['Catagories'].'">'.$row_book['Catagories'].'</option>
                ';
            }else{
                echo '  
                <option value="'.$row_book['Catagories'].'">'.$row_book['Catagories'].'</option>
                ';
            }
        }
    }
}

function Edit_Exercise(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $UserName = $_SESSION['user'];
    $Id_Exercise = $_GET['exercise'];

    $sql_user = "SELECT * FROM user WHERE User_Name= '$UserName'";
    $result_user = $con->query($sql_user);
    if($result_user->num_rows > 0) {
        while ($row_user = $result_user->fetch_assoc()) {
            $user_Id = $row_user['Id'];
            $sql_exercise = "SELECT * FROM exercise WHERE User_Id='$user_Id' AND Id='$Id_Exercise'";
            $result_exercise = $con->query($sql_exercise);
            if ($result_exercise->num_rows > 0) {
                while ($row_exercise = $result_exercise->fetch_assoc()) {
                    $Q_Answer_1 = '';
                    $Q_Answer_2 = '';
                    $Q_Answer_3 = '';
                    $Q_Answer_4 = '';
                    if($row_exercise['Q_answer'] == $row_exercise['Answer_1']){
                        $Q_Answer_1 = 'checked';
                    }else if($row_exercise['Q_answer'] == $row_exercise['Answer_2']){
                        $Q_Answer_2 = 'checked';
                    }else if($row_exercise['Q_answer'] == $row_exercise['Answer_3']){
                        $Q_Answer_3 = 'checked';
                    }else if($row_exercise['Q_answer'] == $row_exercise['Answer_4']){
                        $Q_Answer_4 = 'checked';
                    }
                    echo'
            <table class="table" style="max-width: 70%">
        <tr>
            <td><label for="Num_Question"><span style="color: red">*</span> Question number: </label></td>
            <td><input type="number" class="form-control" name="Num_Question" id="Num_Question" value="'.$row_exercise['Number_Q'].'" style="max-width: 50%" autofocus required></td>
        </tr>

        <tr>
            <td><label for="Question"><span style="color: red">*</span> Question: </label></td>
            <td><input type="text" class="form-control" name="Question" id="Question" value="'.$row_exercise['Question'].'" required></td>
        </tr>

        <tr>
            <td><label for="Answer_1"><span style="color: red">*</span> Answer 1: </label></td>
            <td>
                <input type="text" class="form-control" name="Answer_1" id="Answer_1" value="'.$row_exercise['Answer_1'].'" style="max-width: 70%; display: inline;margin-right: 5px" required>
                <label><input type="radio" name="Q_Answer" class="Q_Answer" value="1" '.$Q_Answer_1.' required> Correct answer!</label>
            </td>
        </tr>

        <tr>
            <td><label for="Answer_2"><span style="color: red">*</span> Answer 2: </label></td>
            <td>
                <input type="text" class="form-control" name="Answer_2" id="Answer_2" value="'.$row_exercise['Answer_2'].'" style="max-width: 70%; display: inline;margin-right: 5px" required>
                <label><input type="radio" name="Q_Answer" class="Q_Answer" value="2" '.$Q_Answer_2.' required> Correct answer!</label>
            </td>
        </tr>

        <tr>
            <td><label for="Answer_3"><span style="color: red">*</span> Answer 3: </label></td>
            <td>
                <input type="text" class="form-control" name="Answer_3" id="Answer_3" value="'.$row_exercise['Answer_3'].'" style="max-width: 70%; display: inline;margin-right: 5px" required>
                <label><input type="radio" name="Q_Answer" class="Q_Answer" value="3" '.$Q_Answer_3.' required> Correct answer!</label>
            </td>
        </tr>

        <tr>
            <td><label for="Answer_4"><span style="color: red">*</span> Answer 4: </label></td>
            <td>
                <input type="text" class="form-control" name="Answer_4" id="Answer_4" value="'.$row_exercise['Answer_4'].'" style="max-width: 70%; display: inline;margin-right: 5px" required>
                <label><input type="radio" name="Q_Answer" class="Q_Answer" value="4" '.$Q_Answer_4.' required> Correct answer!</label>

            </td>
        </tr>

    </table>

    ';
                }
            }
        }
    }

}

function Get_Exercise(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $UserName = $_SESSION['user'];
    $count = '';
    $sql_user = "SELECT * FROM user WHERE User_Name= '$UserName'";
    $result_user = $con->query($sql_user);
    if($result_user->num_rows > 0){
        while ($row_user = $result_user->fetch_assoc()){
            $user_Id = $row_user['Id'];
            $sql_exercise = "SELECT * FROM exercise WHERE User_Id='$user_Id'";
            $result_exercise = $con->query($sql_exercise);
            if($result_exercise->num_rows > 0){
                while ($row_exercise = $result_exercise->fetch_assoc()){
                    $count++;
                    $Serial_Book = $row_exercise['Serial_Book'];
                    $sql_book = "SELECT * FROM book WHERE Serial='$Serial_Book'";
                    $result_book = $con->query($sql_book);
                    if($result_book->num_rows > 0){
                        while ($row_book = $result_book->fetch_assoc()) {
                            echo '
                        <tr>
                            <td style="padding: 5px">' . $count . '</td>
                            <td style="padding: 10px">' . substr($row_exercise['Question'], 0, 55) . '</td>
                            <td style="padding: 10px">' . $row_exercise['Number_Q'] . '</td>
                            <td style="padding: 10px">' . $row_book['Name_Book'] . '</td>
                            <td style="padding: 10px">' . $row_exercise['Answer_1'] . '</td>
                            <td style="padding: 10px">' . $row_exercise['Answer_2'] . '</td>
                            <td style="padding: 10px">' . $row_exercise['Answer_3'] . '</td>
                            <td style="padding: 10px">' . $row_exercise['Answer_4'] . '</td>
                            <td style="padding: 10px">' . $row_exercise['Q_answer'] . '</td>
                            <td style="padding: 10px"><input type="button" name="Edit" value="Edit" class="btn" onclick="location.href=\'ControlPanel.php?CP=Edit_Exercise&Serial=' . $row_exercise['Serial_Book'] . '&exercise='.$row_exercise['Id'].'\'"></td>
                            <td style="padding: 10px"><input type="button" class="delete_exercise btn btn-red" name="' . $row_exercise['Question'] . '" id="' . $row_exercise['Id'] . '" value="Delete"></td>
                        </tr>
                    ';
                        }
                    }
                }
            }
        }
    }

}

function Get_Id_book(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

        echo '
            <tr>
                <td><label for="books">Choose book: </label></td>
                <td>
                    <select class="form-control" id="books" onchange="Id_Book()" required>
                        <option>choose book...</option>
        ';

        $sql_book = "SELECT * FROM book";
        $result_book = $con->query($sql_book);
        if ($result_book->num_rows > 0){
            while ($row_book = $result_book->fetch_assoc()){
                $select = "";
                if ($_GET['Serial'] == $row_book['Serial']){
                    $select = "selected";
                }
                echo '
                    <option '.$select.' value="'.$row_book['Serial'].'">'.$row_book['Name_Book'].'</option>
                    ';
            }
        }

        echo '
                    </select>
                </td>
            </tr>
        ';
}

function Get_Books(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $UserName = $_SESSION['user'];
    $count = '';
    $sql_user = "SELECT * FROM user WHERE User_Name= '$UserName'";
    $result_user = $con->query($sql_user);
    if($result_user->num_rows > 0){
        while ($row_user = $result_user->fetch_assoc()){
            $user_Id = $row_user['Id'];
            $sql_book = "SELECT * FROM book WHERE User_Id='$user_Id'";
            $result_book = $con->query($sql_book);
            if($result_book->num_rows > 0){
                while ($row_book = $result_book->fetch_assoc()){
                    $count++;
                    echo '
                        <tr>
                            <td style="padding: 5px">'.$count.'</td>
                            <td style="padding: 10px">'.$row_book['Serial'].'</td>
                            <td style="padding: 10px">'.$row_book['Name_Book'].'</td>
                            <td style="padding: 10px">'.$row_book['Price'].'</td>
                            <td style="padding: 10px"><input type="button" name="add_exercise" value="Add Exercise" class="btn" onclick="location.href=\'ControlPanel.php?CP=Add_Exercise&Serial='.$row_book['Serial'].'\'"></td>
                            <td style="padding: 10px"><input type="button" name="Edit" value="Edit" class="btn" onclick="location.href=\'ControlPanel.php?CP=Edit_Book&Serial='.$row_book['Serial'].'\'"></td>
                            <td style="padding: 10px"><input type="button" class="delete_data btn btn-red" name="'.$row_book['Name_Book'].'" id="'.$row_book['Serial'].'" value="Delete"></td>
                        </tr>
                    ';
                }
            }
        }
    }

    if ($_SESSION['user'] == 'admin'){
        $sql_book = "SELECT * FROM book";
        $result_book = $con->query($sql_book);
        if($result_book->num_rows > 0){
            while ($row_book = $result_book->fetch_assoc()){
                $sql_user = "SELECT * FROM user WHERE Id=$row_book[User_Id]";
                $result_user = $con->query($sql_user);
                if($result_user->num_rows > 0) {
                    while ($row_user = $result_user->fetch_assoc()) {
                        $name_user = $row_user['First_Name'] . " " . $row_user['Last_Name'];
                    }
                }
                $count++;
                echo '
                        <tr>
                            <td style="padding: 5px">'.$count.'</td>
                            <td style="padding: 10px">'.$row_book['Serial'].'</td>
                            <td style="padding: 10px">'.$row_book['Name_Book'].'</td>
                            <td style="padding: 10px">'.$row_book['Price'].'</td>
                            <td style="padding: 10px">'.$name_user.'</td>
                            <td style="padding: 10px"><input type="button" name="Edit" value="Edit" class="btn" onclick="location.href=\'ControlPanel.php?CP=Admin_Edit_Book&Serial='.$row_book['Serial'].'\'"></td>
                            <td style="padding: 10px"><input type="button" class="delete_data btn btn-red" name="'.$row_book['Name_Book'].'" id="'.$row_book['Serial'].'" value="Delete"></td>
                        </tr>
                    ';
            }
        }
    }

}

function Questions_Page(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');


    $Serial_Book = $_GET['Serial'];
    $this_page = $_GET['pid'];

    $sql_check = "SELECT * FROM book WHERE Serial='$Serial_Book'";
    $result_check = $con->query($sql_check);
    if ($result_check->num_rows > 0){
        while ($row_check = $result_check->fetch_assoc()){
            echo '
                <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
                    <a href="index.php?pid=IEBook#IEBook" style="text-transform: uppercase">IEBook</a> -
                    <a href="index.php?pid=Show_Book&Serial='.$Serial_Book.'" style="text-transform: uppercase">'.$row_check['Name_Book'].'</a> -
                    <a href="" style="text-transform: uppercase">'.$this_page.'</a> 
                    
                </div>
            ';

    $count = '';
    echo '
<div class="w3-padding-32" style="min-height: 70%">
    <center>
        <form action="index.php?pid=Answer_Question&Serial='.$Serial_Book.'" method="post" role="form">
    ';
    $sql_ques = "SELECT * FROM exercise WHERE Serial_Book = '$Serial_Book'";
    $result_Ques = $con->query($sql_ques);
    if($result_Ques->num_rows > 0){
        while ($row_Ques = $result_Ques->fetch_assoc()) {
            $count++;
            echo '
        <table class="w3-table" style="width: 80%">
            <tr>
                <input type="text" name="Id_Question" value="'.$row_Ques['Id'].'" style="display: none">
                <td class="w3-border w3-light-gray"><i class="w3-text-red">Questions '.$count.' :</i> '.$row_Ques['Question'].'</td>
            </tr>
        </table>
        <table class="w3-table" style="width: 80%">
            <tr>
                <td class="w3-border w3-light-gray"><label><input type="radio" name="'.$row_Ques['Id'].'" value="'.$row_Ques['Answer_1'].'" required> '.$row_Ques['Answer_1'].'</label></td>
                <td class="w3-border w3-light-gray"><label><input type="radio" name="'.$row_Ques['Id'].'" value="'.$row_Ques['Answer_2'].'" required> '.$row_Ques['Answer_2'].'</label></td>
                <td class="w3-border w3-light-gray"><label><input type="radio" name="'.$row_Ques['Id'].'" value="'.$row_Ques['Answer_3'].'" required> '.$row_Ques['Answer_3'].'</label></td>
                <td class="w3-border w3-light-gray"><label><input type="radio" name="'.$row_Ques['Id'].'" value="'.$row_Ques['Answer_4'].'" required> '.$row_Ques['Answer_4'].'</label></td>
            </tr>
        </table>
        <br>
        ';
        }
        echo '
        <input type="submit" name="Answer_ques" value="Answer" class="w3-margin-right w3-padding w3-btn w3-border-gray w3-gray">
            <input type="reset" value="Reset" class="w3-margin-left w3-padding w3-btn w3-border-red w3-red">
        </form>
        ';
    }else {
        echo '<div style="margin-top: 10%">
                      <p class="w3-xxxlarge w3-text-red">There is no question for this book</p>
                  </div>';
    }
        }
    }else {
        echo '<div style="margin-top: 10%">
                      <p class="w3-xxxlarge w3-text-red">There is no book like Serial ['.$_GET['Serial'].']</p>
                  </div>';
    }
    echo '
            
    </center>
</div>
    ';

}

function Show_Book(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $Serial_Book = $_GET['Serial'];
    if(empty($Serial_Book)){
        echo '<script>location.href="http://localhost/OY44/index.php?pid=IEBook"</script>
              <div class="w3-row">
             ';
    }

    $result = $con->query("SELECT * FROM book,user WHERE User_Id=Id AND Serial='$Serial_Book'");
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
                <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
                    <a href="index.php?pid=IEBook#IEBook" style="text-transform: uppercase">IEBook</a> -
                    <a href="" style="text-transform: uppercase">'.$row['Name_Book'].'</a>
                </div>
            ';

            echo '
                <embed class="w3-right" style="margin-top:10px; margin-right:10px;" src="Upload_Books/' . $row["Location"] . '" width="800px" height="600px"></embed>
            </div>
        <div class="w3-row m5">
        
            <div class="Exam_btn w3-col s1">
                <button class="w3-btn" name="exam" value="exam" onclick="location.href=\'index.php?pid=Questions_Page&Serial='.$_GET['Serial'].' \'">Answer Questions</button>
            </div>
            ';
            if (empty($row['Image'])) {
                $row['Image'] = 'defult.png';
            }
                echo '
            <div class="img_auther w3-col s2">
                 <img src="Images/Pic/' . $row['Image'] . '" width="50px" height="50px">
            </div>
            
            <div class="rating w3-col s3 w3-right">
                <p style="margin-left: 30px">'.$row['First_Name'] ." ".$row['Last_Name'].'</p>
                    <ul class="rating-stars" style="display: flex;list-style-type: none;">
                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                        <li style="margin-left: 7px;"><i class="fa fa-star-half-o"></i></li>
                    </ul>
            </div>
        </div>
    ';
        }
    }
}

function Catagories(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    if(empty($_GET['List'])){
        $_GET['List'] = 'All';
    }
    echo'
        <ul>
            <li id="All" onclick="location.href=\'http://localhost/OY44/index.php?pid=IEBook&List=All#IEBook\'"><a>ALL</a></li>
            ';
    if ($_GET['List'] == 'All' ){
        echo "
             <script>
             document.getElementById('All').style.background = '#4D636F';
             document.getElementById('All').style.color = 'white';
             </script>
             ";
    }

    //list
    $sql_list = "SELECT distinct Catagories FROM book";
    $result_list = $con->query($sql_list);
    if ($result_list->num_rows > 0) {
        while ($row_list = $result_list->fetch_assoc()) {

            echo '
                  <hr>
                  <li id="'.$row_list['Catagories'].'" onclick="location.href=\'http://localhost/OY44/index.php?pid=IEBook&List=' . $row_list['Catagories'] . '#IEBook\'"><a>' . $row_list['Catagories'] . '</a></li>
                ';
            if ($_GET['List'] == $row_list['Catagories'] ){
                echo "
                     <script>
                     document.getElementById('".$row_list['Catagories']."').style.background = '#4D636F';
                     document.getElementById('".$row_list['Catagories']."').style.color = 'white';
                     </script>
                    ";
            }
        }

    }

        echo '
                </ul>
             ';
}

function List_Books(){

    if (empty($_GET['page'])) {
        $_GET['page'] = '1';
    }

    echo '
            <div class="Book w3-col s9">
                <ul>
            ';
    $con = new mysqli('localhost', 'root', '', 'db_iebook_8003115736_v');
    $results_per_page = 6;

    isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;

    if ($page > 1) {
        $this_page_first_result = ($page * $results_per_page) - $results_per_page;
    } else {
        $this_page_first_result = 0;
    }

    $lisst = $_GET['List'];

    switch ($lisst) {
        case "All" :
            $sql = "SELECT * FROM book";
            break;
        default :
            $sql = "SELECT Catagories FROM book WHERE Catagories='$lisst'";
    }

    //Books
    $result_book = $con->query($sql);
    $number_of_results = $result_book->num_rows;

    $totalPages = $number_of_results / $results_per_page;

    switch ($lisst) {
        case "All" :
            $sql = "SELECT * FROM book,user WHERE User_Id=Id AND Available='1' LIMIT $this_page_first_result, $results_per_page";
            break;
        default :
            $sql = "SELECT * FROM book,user WHERE User_Id=Id AND Available='1' AND Catagories='$lisst' LIMIT $this_page_first_result, $results_per_page";
    }

    $result_book = $con->query($sql);
    if ($result_book->num_rows > 0) {
        while ($row_book = $result_book->fetch_assoc()) {

            $Id_Book = $row_book['Id_Book'];
            $Id_User = '';
            if (!empty($_SESSION['user'])) {
                $User_Name = $_SESSION['user'];
                $sql_user = "SELECT * FROM user WHERE User_Name='$User_Name'";
                $result_user = $con->query($sql_user);
                if ($result_user->num_rows > 0) {
                    while ($row_user = $result_user->fetch_assoc()) {
                        $Id_User = $row_user['Id'];
                    }
                }
            }

            echo '
                    <div class="w3-container w3-card w3-padding-small w3-margin w3-col s3">
                                    <li>
                                        <div class="s-product" style="width:155px;">
                                            <div class="s-product-img">
                                                <img src="Upload_Books/' . $row_book['Image_Book'] . '" alt="" width="100%" height="217">
                                                <div class="s-product-hover">
                                                    <ul>
                                                    ';
if (empty($_SESSION['user'])){
    echo '
                <li><a class="Favorite" title="Favorite"><i class="fa fa-heart"></i></a></li>
                ';
}else {
    $sql_favorite = "SELECT * FROM favorite_book WHERE User_Id=$Id_User AND Book_Id=$Id_Book";
    $result_favorite = $con->query($sql_favorite);
    if ($result_favorite->num_rows > 0) {
        echo '
                    <li><a class="UnFavorite" title="Un Favorite" value="' . $Id_Book . '" name="' . $Id_User . '"><i class="fa fa-heart w3-text-red"></i></a></li>
                    ';
    } else {
        echo '
                <li><a class="Favorite" title="Favorite" value="' . $Id_Book . '" name="' . $Id_User . '"><i class="fa fa-heart"></i></a></li>
                ';
    }
}
            echo'
                                                        <li><a href="index.php?pid=Show_Book&Serial='.$row_book['Serial'].'"><i class="fa fa-book"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="s-product-tooltip">
                                                    <ul class="book-detail-list" style="margin-left: -40px; margin-bottom: -20px">
                                                        <li style="display: inline;">' . $row_book['Name_Book'] . '</li><li style="display: inline; color:darkgray;"> |  Price: <span>$</span>' . $row_book['Price'] . '</li>
                                                        <li>Writed by : <span class="theme-color">' . $row_book['First_Name'] . " " . $row_book['Last_Name'] . '</span></li>
                                                        <li>Pages : <span>' . $row_book['Page'] . '</span></li>
                                                    </ul>
                                                    <p>Summary : <span>' . $row_book['Summary'] . '</span></p>
                                                    <ul class="rating-stars" style="display: flex">
                                                        <li><span>Rating: </span> </li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star"></i></li>
                                                        <li style="margin-left: 7px;"><i class="fa fa-star-half-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h6><a href="">' . $row_book['Name_Book'] . '</a></h6>
                                            <span>' . $row_book['First_Name'] . " " . $row_book['Last_Name'] . '</span>
                                        </div>
                                    </li>
                                </div>
    ';
        }
    }

    echo '
            </ul>
        </div>
        <div class="div_page">
    ';

    // display the links to the pages
//    if ($lisst != 'All') {
//        $totalPages++;
//    }

    if ($page > 1) {
        print '<a style="margin: 2px;" id="Previous" class="page" href="index.php?pid=IEBook&List=' . $_GET['List'] . '&page=' . $page = $page - 1 . '#IEBook">Prev</a>';
    }

    for ($page = 1; $page < $totalPages+1; $page++) {
        print '<a style="margin: 2px;" id="' . $page . '" class="page" href="index.php?pid=IEBook&List=' . $_GET['List'] . '&page=' . $page . '#IEBook">' . $page . '</a>';
    }

    $next = $_GET['page'] + 1;
    $page--;
    if ($_GET['page'] != $page) {
        print '<a style="margin: 2px;" id="Next" class="page" href="index.php?pid=IEBook&List=' . $_GET['List'] . '&page=' . $next . '#IEBook">Next</a>';
    }

    echo "
        </div>
          <script>
              document.getElementById('".$_GET['page']."').style.background = '#4D636F';
              document.getElementById('".$_GET['page']."').style.color = 'white';
          </script>
         ";
}

function Profile(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $Name_User = $_GET['user'];

//User
    $sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {
            $user_id = $row_User['Id'];
            $user_name = $row_User['User_Name'];

            echo '
                        <!-- Middle Column -->
                        <div class="w3-col m7">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <div class="w3-card-2 w3-round w3-white">
                                        <div class="w3-container w3-padding">
                                            <p><input type="text" id="Add_Post" class="w3-border w3-padding" placeholder="Express what is inside you ..." style="width: 100%;"></p>
                                            <button type="reset" class="button_add_post w3-button w3-theme" id="' . $user_id . '"><i class="fa fa-pencil"></i>  Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                ';

            //Post_Profile
            $sql_Post_Profile = "SELECT * FROM post WHERE  User_Id = '$user_id' ORDER BY Date_Post DESC ";
            $result_Post_Profile = $con->query($sql_Post_Profile);
            if ($result_Post_Profile->num_rows > 0) {
                while ($row_Post_Profile = $result_Post_Profile->fetch_assoc()) {
                    echo '
                            <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
                                <img src="Images/pic/' . $row_User['Image'] . '" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height: 55px">
                                <span class="w3-right w3-opacity"> ' . $row_Post_Profile['Date_Post'] . ' </span>
                                ';
                    if (!empty($row_Post_Profile['Subject'])) {
                        echo '
                                <span class="w3-right w3-opacity w3-text-red w3-margin-right"> This post from university part </span>
                                ';
                    }
                    echo '
                                <h4>' . $row_User['First_Name'] . " " . $row_User['Last_Name'] . '</h4><br>
                                <hr class="w3-clear">
                                ';
                    if (!empty($row_Post_Profile['Subject'])) {
                        echo '
                                <p class="w3-xlarge">Subject: ' . $row_Post_Profile['Subject'] . '</p>
                                ';
                    }
                    echo '
                                <p class="Post-Prof" id="' . $row_Post_Profile['Message'] . '">' . $row_Post_Profile['Message'] . '.</p>
                  ';
                    if (!empty($row_Post_Profile['Image'])) {
                        echo '
                                <div class="w3-row-padding" style="margin:0 -16px">
                                    <div class="w3-half">
                                        <img src="Images/' . $row_Post_Profile['Image'] . '" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
                                    </div>
                                    <div class="w3-half">
                                        <img src="Images/' . $row_Post_Profile['Image'] . '" style="width:100%" alt="Nature" class="w3-margin-bottom">
                                    </div>
                                </div>
                                ';
                    }

                    $Id_Post = $row_Post_Profile['Id'];

                    //Post_likes
                    $sql_likes = "SELECT * FROM likes WHERE  User_Id = '$user_id' AND Post_Id='$Id_Post'";
                    $result_likes = $con->query($sql_likes);
                    if ($result_likes->num_rows > 0) {
                        while ($row_likes = $result_likes->fetch_assoc()) {
                            if ($row_likes['Type_Like'] == 'Like') {
                                echo '         
                                <input id="Id_User" type="text" name="' . $row_User['Id'] . '" style="Display: none">
                                
                                <lable class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  ' . $row_Post_Profile['Like_Post'] . '</lable>
                                                            
                                <button type="button" id="' . $Id_Post . '" class="Dislike-profile-update w3-button w3-margin-bottom w3-red"><i class="fa fa-thumbs-down"></i>  ' . $row_Post_Profile ['Dislike'] . '</button>
                                ';
                            }
                            if ($row_likes['Type_Like'] == 'Dislike') {
                                echo '
                                <input id="Id_User" type="text" name="' . $row_User['Id'] . '" style="Display: none">
                                                                
                                <button type="button" id="' . $Id_Post . '" class="Like-profile-update w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  ' . $row_Post_Profile['Like_Post'] . '</button>
                                
                                <lable class="w3-button w3-margin-bottom w3-red"><i class="fa fa-thumbs-down"></i>  ' . $row_Post_Profile ['Dislike'] . '</lable>
                                ';
                            }
                        }
                    } else {
                        echo '
                                <input id="Id_User" type="text" name="' . $row_User['Id'] . '" style="Display: none">
                                
                                <button type="button" id="' . $Id_Post . '" class="Like-profile w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  ' . $row_Post_Profile['Like_Post'] . '</button>
                                                            
                                <button type="button" id="' . $Id_Post . '" class="Dislike-profile w3-button w3-margin-bottom w3-red"><i class="fa fa-thumbs-down"></i>  ' . $row_Post_Profile ['Dislike'] . '</button>
                                ';
                    }
                    if ($_SESSION['user'] == $user_name) {
                        echo '
                            <div class="delete_data w3-padding w3-button w3-red right" style="margin-bottom: 5px" name="' . $row_Post_Profile['Message'] . '" id="' . $row_Post_Profile['Id'] . '" value="pid=Profile"><i class="fa fa-trash"></i></div>
                        ';
                    }
                    echo '
                  </div>
                ';
                }
            }
//                            <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
//                                <img src="Images/Icons/avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
//                                <span class="w3-right w3-opacity">16 min</span>
//                                <h4>Jane Doe</h4><br>
//                                <hr class="w3-clear">
//                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
//                                <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
//                                <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
//                            </div>
//
//                            <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
//                                <img src="Images/Icons/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
//                                <span class="w3-right w3-opacity">32 min</span>
//                                <h4>Angie Jane</h4><br>
//                                <hr class="w3-clear">
//                                <p>Have you seen this?</p>
//                                <img src="Images/nature.jpg" style="width:100%" class="w3-margin-bottom">
//                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
//                                <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
//                                <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
//                            </div>
            echo '
                            <!-- End Middle Column -->
                        </div>
                        
                        ';
        }
    }

}

function getPic(){
    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');
    $Name_User = $_SESSION['user'];

    //User
    $sql_User = "SELECT Image FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {
                if (empty($row_User['Image'])) {
                    $row_User['Image'] = 'defult.png';
                }
            echo '
                <a href="../../index.php?pid=Profile" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="../../Images/Pic/'.$row_User['Image'].'" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a> 
                ';
        }
    }
}

function select_uni_info($uni_info){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    //uni
    $sql = "SELECT * FROM university";
    $result_uni = $con->query($sql);
    if ($result_uni->num_rows > 0) {
        while ($row_uni = $result_uni->fetch_assoc()) {

            if ($uni_info == $row_uni['Name']){
                echo '
                <option selected value="'.$row_uni['Name'].'">'.$row_uni['Name'].'</option>
                ';
            }else{
                echo '  
                <option value="'.$row_uni['Name'].'">'.$row_uni['Name'].'</option>
                ';
            }
        }
    }
}

function select_college_info($college_info){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    //college
    $sql = "SELECT * FROM college";
    $result_college = $con->query($sql);
    if ($result_college->num_rows > 0) {
        while ($row_college = $result_college->fetch_assoc()) {

            if ($college_info == $row_college['Name']){
                echo '
                <option selected value="'.$row_college['Name'].'">'.$row_college['Name'].'</option>
                ';
            }else{
                echo '  
                <option value="'.$row_college['Name'].'">'.$row_college['Name'].'</option>
                ';
            }
        }
    }
}

function select_dep_info($dep_info){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    //college
    $sql = "SELECT * FROM department";
    $result_dep = $con->query($sql);
    if ($result_dep->num_rows > 0) {
        while ($row_dep = $result_dep->fetch_assoc()) {

            if ($dep_info == $row_dep['Name']){
                echo '
                <option selected value="'.$row_dep['Name'].'">'.$row_dep['Name'].'</option>
                ';
            }else{
                echo '  
                <option value="'.$row_dep['Name'].'">'.$row_dep['Name'].'</option>
                ';
            }
        }
    }
}

function Edit_Profile(){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    $Name_User = $_SESSION['user'];

    //User
    $sql_User = "SELECT * FROM user WHERE  User_Name = '$Name_User'";
    $result_user = $con->query($sql_User);
    if ($result_user->num_rows > 0) {
        while ($row_User = $result_user->fetch_assoc()) {
                if (empty($row_User['Image'])) {
                    $row_User['Image'] = 'defult.png';
                }
      echo '
        <div class="w3-row" style="padding: 20px;  margin-left: 10%; margin-right: 10%">

                    <!-- edit form column -->
           <form id="Edit-Profile-form" method="post" action="Edit_Profile_Proccess.php" enctype="multipart/form-data">
                    <!-- left column -->
                    <div class="w3-row m3 w3-margin-bottom">
                        <div class="w3-center">
                        <label>
                            <img src="../../Images/Pic/'.$row_User['Image'].'" class="w3-circle" alt="avatar" style="width: 100px;height: 100px">
                            <input type="file" name="photo" title="upload photo" style="margin-top: 15px; margin-bottom: 15px" accept="image/*">
                        </label>
                        </div>
                    </div>
                    
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input class="form-control" name="firstName" value="'.$row_User['First_Name'].'" placeholder="First name" type="text">
                            </div>
        
                            <div class="form-group col-md-6">
                                <input class="form-control" name="secondName" value="'.$row_User['Last_Name'].'" placeholder="Last name" type="text">
                            </div>
        
                            <div class="form-group col-md-12">
                                <input class="form-control" name="email" value="'.$row_User['Email'].'" placeholder="Email address - Ex : ( example@example.com )" type="email">
                            </div>
        
                            <div class="form-group col-md-4">
                                <input class="form-control" name="username" value="'.$row_User['User_Name'].'" placeholder="User name" type="text" disabled>
                            </div>
        
                            <div class="form-group col-md-4">
                                <input class="form-control" name="phone" value="'.$row_User['Phone_Number'].'" placeholder="Phone number" type="text">
                            </div>
        
                            <div class="form-group col-md-4">
                                <input class="form-control" type="text" name="Academic_Number" value="'.$row_User['Academic_Number'].'" placeholder="Academic number" id="Academic_Number" />
                            </div>
        
                            <div class="clearfix">
                            </div>
        
                            <div class="form-group col-md-6">
                                <input class="form-control" name="password" value="'.$row_User['Password'].'" id="password" placeholder="Password" type="password">
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control" name="password2" value="'.$row_User['Password'].'" placeholder="Re-enter password" type="password">
                            </div>
                            <div class="clearfix">
                            </div>
        
                            <div class="form-group col-md-12">
                                <input class="form-control" name="website" value="'.$row_User['Web_Site'].'" placeholder="Website - Ex : ( http://www.example.com )" type="url">
                            </div>
        
                            <div class="form-group col-md-6">
                                <input class="form-control" type="date" name="Date_of_berth" value="'.$row_User['Date_Of_Birth'].'" placeholder="Date of berth" id="Date_of_berth"/>
                            </div>
        
                            <div class="form-group col-md-6">
                                <select class="form-control" name="country">
                                <option value="'.$row_User['Country'].'">'.$row_User['Country'].'</option>
                                    <optgroup label="Choose Country ---">
                                        <option value="Soudi Arabia">Soudi Arabia</option>
                                    </optgroup>
                                </select>
                            </div>
        
                            <div class="form-group col-md-6">
                                <select class="form-control" name="city">
                                    <option value="'.$row_User['City'].'">'.$row_User['City'].'</option>
                                    <optgroup label="Choose City ---" style="width: 200px">
                                        <option value="Madinah">Madinah</option>
                                    </optgroup>
                                </select>
                            </div>
        
                            <div class="form-group col-md-6">
                                <select class="form-control" name="university">
                                    <optgroup label="Choose University ---">
                                    ';
                                        select_uni_info($row_User['University']);
                                    echo '
                                    </optgroup>
                                </select>
                            </div>
        
                            <div class="form-group col-md-6">
                                <select class="form-control" name="college">
                                    <optgroup label="Choose College ---">
                                         ';
                                        select_college_info($row_User['College']);
                                    echo '
                                    </optgroup>
                                </select>
                            </div>
        
                            <div class="form-group col-md-6">
                                <select class="form-control" name="department">
                                    <optgroup label="Choose Department ---">
                                        ';
                                        select_dep_info($row_User['Department']);
                                    echo '
                                    </optgroup>
                                </select>
                            </div>
        
                            <div class="form-group col-md-12">
                                <div style="margin-left: 45px; margin-right: 25px; margin-bottom: 10px">
                                    <legend>Gender</legend>
                                    ';
                    if ($row_User['Gender'] == 'M'){
                        echo '<label style="margin-right: 10px"><input type="radio" value="Male" name="gender" id="M_gender" checked required/> Male</label>
                              <label><input type="radio" value="Female" name="gender" id="F_gender" required/> Female</label>
                            ';
                    }else{
                        echo '
                              <label style="margin-right: 10px"><input type="radio" value="Male" name="gender" id="M_gender" required/> Male</label>
                              <label><input type="radio" value="Female" name="gender" id="F_gender" checked required/> Female</label>
                             ';

                         }
                    echo '
                                </div>
                            </div>
                         <div>
                            <input class="btn btn-primary" id="submit-button" type="submit" value="Edit Profile">
                         </div>
                    </div>
                </form>
        </div>
    ';
        }
    }
}

function PostOperations($Name_University,$Name_College,$Name_Department,$Name_Subject){

    $con = new mysqli('localhost','root','','db_iebook_8003115736_v');

    echo '
        <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
            <a href="index.php?pid=Home">Home</a> -
            <a href="index.php#University" style="text-transform: uppercase">'.$Name_University.'</a> -
            <a href="index.php?pid=Colleges&uni='.$Name_University.'" style="text-transform: uppercase">College_of_'.$Name_College.' </a> -
            <a href="index.php?pid=Department&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'" style="text-transform: uppercase"> '.$Name_Department.'</a> -
            <a href="index.php?pid=Posts&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'&sub='.$Name_Subject.'" style="text-transform: uppercase"> '.$Name_Subject.'</a>
        </div>
        
        <div class="w3-row">
        ';

    $Id = $_GET['post'];
        //Post
            $sql_Post_User = "SELECT * FROM post WHERE Subject = '$Name_Subject' AND Id=$Id";
            $result_Post = $con->query($sql_Post_User);
            if($result_Post->num_rows > 0) {
                while ($row_Post = $result_Post->fetch_assoc()) {

                    //User
                    $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id]";
                    $result_user = $con->query($sql_User);
                    if ($result_user->num_rows > 0) {
                        while ($row_User = $result_user->fetch_assoc()) {
                            if($row_User['User_Type'] == 'dean' || $row_User['User_Type'] == 'doctor' ){
                            $Name_User = 'D.' . $row_User['User_Name'];
                            $Name_User2 = $row_User['User_Name'];
                            }else{
                                $Name_User = $row_User['User_Name'];
                                $Name_User2 = $row_User['User_Name'];
                            }
                        }
                    }
                    $UserName = $_SESSION['user'];
                    $Id_User = '';
                    //User
                    $sql_User = "SELECT * FROM user WHERE  User_Name= '$UserName'";
                    $result_user = $con->query($sql_User);
                    if ($result_user->num_rows > 0) {
                        while ($row_User = $result_user->fetch_assoc()) {
                            $Id_User = $row_User['Id'];
                        }
                    }
         echo '
            <!-- left Column -->
            <div class="w3-col m10">
            <input id="Id_User" type="text" name="'.$Id_User.'" style="Display: none">
                <!-- Background Post -->
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-margin" style="width: 95%;min-height: 400px">
        
                    <!-- Head Posts -->
                    <div class="w3-display-container w3-center w3-margin-bottom">
                        <div class="w3-display-topleft w3-dark-grey w3-padding" style="text-transform: uppercase;margin-top: 10px;width: 100%">Subject: '.$row_Post['Subject'].'</div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom w3-margin-left w3-margin-right" style="margin-top: 70px"></div>
        
                    <!-- Post -->
                    <div class="w3-row" style="margin: 5px 0 0 50px;">
                        <div  class="w3-padding" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                            <div class="w3-col s1">
                                <div class="w3-row s1 w3-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>'.$row_Post['Date_Post'].'</i></div>
                                <div class="w3-row s1 w3-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>'.$Name_User.'</i></div>
                                <div class="w3-row w3-margin-bottom">
                                ';

                    $Id_Post = $row_Post['Id'];

                    //Post_likes
                    $sql_likes = "SELECT * FROM likes WHERE  User_Id = '$Id_User' AND Post_Id='$Id_Post'";
                    $result_likes = $con->query($sql_likes);
                    if ($result_likes->num_rows > 0) {
                        while ($row_likes = $result_likes->fetch_assoc()) {
                            if ($row_likes['Type_Like'] == 'Like'){
                                echo '
                                <table>
                                <tr>
                                <input id="Id_User" type="text" name="' . $Id_User . '" style="Display: none">
                                
                                <td><lable class="w3-button w3-text-green w3-large"><i class="fa fa-thumbs-up"></i>  ' . $row_Post['Like_Post'] . '</lable></td>
                                                            
                                <td><button type="button" id="'.$Id_Post.'" class="Dislike-profile-update w3-button w3-text-red w3-large"><i class="fa fa-thumbs-down"></i>  ' . $row_Post ['Dislike'] . '</button></td>
                                </tr>
                                </table>
                                ';
                            }
                            if ($row_likes['Type_Like'] == 'Dislike'){
                                echo '
                                <table>
                                <tr>
                                <input id="Id_User" type="text" name="' . $Id_User . '" style="Display: none">
                                                                
                                <td><button type="button" id="'.$Id_Post.'" class="Like-profile-update w3-button w3-text-green w3-large"><i class="fa fa-thumbs-up"></i>  ' . $row_Post['Like_Post'] . '</button></td>
                                
                                <td><lable class="w3-button w3-text-red w3-large"><i class="fa fa-thumbs-down"></i>  ' . $row_Post ['Dislike'] . '</lable></td>
                                </tr>
                                </table>
                                ';
                            }
                        }
                    }else{
                        echo '
                                <table>
                                <tr>
                                <input id="Id_User" type="text" name="' . $Id_User . '" style="Display: none">
                                
                                <td><button type="button" id="'.$Id_Post.'" class="Like-profile w3-button w3-text-green w3-large"><i class="fa fa-thumbs-up"></i>  ' . $row_Post['Like_Post'] . '</button></td>
                                                            
                                <td><button type="button" id="'.$Id_Post.'" class="Dislike-profile w3-button w3-text-red w3-large"><i class="fa fa-thumbs-down"></i>  ' . $row_Post ['Dislike'] . '</button></td>
                                </tr>
                                </table>
                                ';
                    }


                    if($_SESSION['user'] == $Name_User2) {
                        echo '
                            <div class="delete_data w3-button w3-red" style="margin-bottom: 5px; margin-left: 1150%" name="'.$row_Post['Subject'].'" id="'.$row_Post['Id'].'" value="pid=Department&uni='.$_GET['uni'].'&college='.$_GET['college'].'&dep='.$_GET['dep'].'"><i class="fa fa-trash"></i></div>
                        ';
                    }
                    echo '
                                </div>   
                            </div>
                        </div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom w3-margin-right w3-margin-left"></div>
        
                    <div class="w3-text-black w3-large w3-padding-48" style="margin: 0 50px 0 50px" >
                        '.$row_Post['Message'].'
                    </div>
                </div>
            </div>
        ';
        }
    }
        $sql_ads = "SELECT * FROM Ads";
        $result_Ads = $con->query($sql_ads);
        if($result_Ads->num_rows > 0){
            while ($row_Ads = $result_Ads->fetch_assoc()){
                echo '
                    <!-- right column -->
                    <div class="w3-col m2">
                        <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin-top" style="margin-left: -10%; width: 230px;height: 630px">
                            <div><img src="Images/'.$row_Ads['Image'].'" alt="advertising" /></div>
                        </div>
                    </div>
                    ';
            }
        }
        echo '</div>';
}

function DepartmentOperations($Name_University,$Name_College,$Name_Department){

    $con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

    $uni = $_GET['uni'];
    $college = $_GET['college'];
    $dep = $_GET['dep'];

    if (empty($_GET['Sort'])){
        $Sort = 'ORDER BY Date_Post DESC';
        $select = '';
        $select_new_post = '';
        $select_old_post = '';
        $select_subject_A_Z = '';
        $select_subject_Z_A = '';
    }else if ($_GET['Sort'] == 'new_post'){
        $Sort = 'ORDER BY Date_Post DESC';
        $select_new_post = 'selected';
        $select_old_post = '';
        $select_subject_A_Z = '';
        $select_subject_Z_A = '';
        $select = '';
    }else if ($_GET['Sort'] == 'old_post'){
        $Sort = 'ORDER BY Date_Post ASC';
        $select_old_post = 'selected';
        $select_new_post = '';
        $select_subject_A_Z = '';
        $select_subject_Z_A = '';
        $select = '';
    }else if ($_GET['Sort'] == 'subject-(A-Z)'){
        $Sort = 'ORDER BY Subject ASC';
        $select_subject_A_Z = 'selected';
        $select_subject_Z_A = '';
        $select_new_post = '';
        $select_old_post = '';
        $select = '';
    }else if ($_GET['Sort'] == 'subject-(Z-A)'){
        $Sort = 'ORDER BY Subject DESC';
        $select_subject_Z_A = 'selected';
        $select_subject_A_Z = '';
        $select_new_post = '';
        $select_old_post = '';
        $select = '';
    }else {
        $Sort = 'ORDER BY Date_Post DESC';
        $select_new_post = '';
        $select_old_post = '';
        $select_subject_A_Z = '';
        $select_subject_Z_A = '';
        $select = '';
    }

    //Department
    $sql_Department = "SELECT Id FROM department WHERE  Name = '$Name_Department'";
    $result_Department = $con->query($sql_Department);
    if($result_Department->num_rows > 0) {
        while ($row_Department = $result_Department->fetch_assoc()) {
            $Id_Department = $row_Department['Id'];
        }
    }

    echo '
        <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
            <a href="index.php?pid=Home">Home</a>  -
            <a href="index.php#University" style="text-transform: uppercase"> '.$Name_University.'</a>  -
            <a href="index.php?pid=Colleges&uni='.$Name_University.'" style="text-transform: uppercase">College_of_ '.$Name_College.' </a> -
            <a href="index.php?pid=Department&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'" style="text-transform: uppercase"> '.$Name_Department.'</a>
        </div>
        
        <div class="w3-row w3-card-2 w3-margin-top w3-margin-left w3-margin-right w3-padding">
            <a href="index.php?pid=Add_Post&uni='.$Name_University.'&college='.$Name_College.'&dep='.$Name_Department.'" class="w3-button w3-border" style="text-decoration: none">Add Post</a>  -
            <select name="list" id="list" class="w3-theme-2 w3-margin-right" style="width: 15%">
                <option '.$select.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'">sort by...</option>
                <option '.$select_new_post.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'&Sort=new_post">new post</option>
                <option '.$select_old_post.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'&Sort=old_post">old post</option>
                <option '.$select_subject_A_Z.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'&Sort=subject-(A-Z)">subject-(A-Z)</option>
                <option '.$select_subject_Z_A.' value="index.php?pid=Department&uni='.$uni.'&college='.$college.'&dep='.$dep.'&Sort=subject-(Z-A)">subject-(Z-A)</option>
                <input type=button value=" Sort " class="w3-btn w3-border" onclick="window.location = document.getElementById(\'list\').value" style="padding-left: 2%; padding-right: 2%"/>
            </select>
        </div>
        
        <div class="w3-row">
        
            <!-- left Column -->
            <div class="w3-col m4">
        
                <!-- Background Post -->
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin" style="width: 95%;min-height: 600px">
                    <!-- Border -->
                    <div class="w3-border-bottom"></div>
        
                    <!-- Head Posts -->
                    <div class="w3-display-container">
                        <div class="w3-display-topleft w3-dark-grey w3-padding" style="text-transform: uppercase;margin-top: 10px;width: 100%">Dean</div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom" style="margin-top: 13%"></div>
                ';

            //Post
            $sql_Post_User = "SELECT * FROM post WHERE Department_Id = $Id_Department $Sort";
            $result_Post = $con->query($sql_Post_User);
            if($result_Post->num_rows > 0) {
                while ($row_Post = $result_Post->fetch_assoc()) {

                    //Dean
                    $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id] AND User_Type = 'dean'";
                    $result_user = $con->query($sql_User);
                    if ($result_user->num_rows > 0) {
                        while ($row_User = $result_user->fetch_assoc()) {
                            $Name_User = 'D.' . $row_User['User_Name'];
                            $Name_User2 = $row_User['User_Name'];
                        }
                    }else{continue;}
                    echo'
                        <!-- Post -->
                        <div class="w3-row" style="margin-top: 15px; cursor: pointer" onclick="window.location.href=\'index.php?pid=Posts&uni=' . $Name_University . '&college=' . $Name_College . '&dep=' . $Name_Department . '&sub=' . $row_Post['Subject'] . '&post='.$row_Post['Id'].'\'">
                            <div  class="w3-padding w3-theme-d2" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                                <div class="w3-col s1">
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Subject: <i>' . $row_Post['Subject'] . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>' . $Name_User . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>'.$row_Post['Date_Post'].'</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="w3-dark-grey" style="width: 95%;margin-left: 2.5%;padding-bottom: 3px;padding-top: 3px">
                            <div title="LIKE" class="fa fa-thumbs-up w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Like_Post'].' </div>
                            <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Dislike'].' </div>
                            ';
                    if($_SESSION['user'] == $Name_User2) {
                        echo '
                            <div class="delete_data w3-padding fa fa-trash w3-btn w3-red" style="margin-bottom: 5px" name="'.$row_Post['Subject'].'" id="'.$row_Post['Id'].'" value="pid=Department&uni='.$_GET['uni'].'&college='.$_GET['college'].'&dep='.$_GET['dep'].'"></div>
                        ';
                    }
                    echo '
                        </div>
                    ';
                }

            }else{
                echo '<div class="w3-center w3-text-red w3-padding-32 w3-xlarge"> No Posts</div>';
            }

             echo'
                </div>
                <!-- End Background Post For Dean -->
            </div>
            <!-- End Left column -->
        
        
            <!-- Middle Column -->
            <div class="w3-col m4">
        
                <!-- Background Post -->
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin" style="width: 95%;min-height: 600px">
                    <!-- Border -->
                    <div class="w3-border-bottom"></div>
        
                    <!-- Head Posts -->
                    <div class="w3-display-container">
                        <div class="w3-display-topleft w3-dark-grey w3-padding" style="text-transform: uppercase;margin-top: 10px;width: 100%">Doctor</div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom" style="margin-top: 13%"></div>
                    ';

            //Post
            $sql_Post_User = "SELECT * FROM post WHERE Department_Id = $Id_Department $Sort";
            $result_Post = $con->query($sql_Post_User);
            if($result_Post->num_rows > 0) {
                while ($row_Post = $result_Post->fetch_assoc()) {

                    //Doctor
                    $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id] AND User_Type = 'doctor'";
                    $result_user = $con->query($sql_User);
                    if ($result_user->num_rows > 0) {
                        while ($row_User = $result_user->fetch_assoc()) {
                            $Name_User = 'D.' . $row_User['User_Name'];
                            $Name_User2 = $row_User['User_Name'];
                        }
                    }else{continue;}

                    echo '
                        <!-- Post -->
                        <div class="w3-row" style="margin-top: 15px; cursor: pointer" onclick="window.location.href=\'index.php?pid=Posts&uni=' . $Name_University . '&college=' . $Name_College . '&dep=' . $Name_Department . '&sub=' . $row_Post['Subject'] . '&post='.$row_Post['Id'].'\'">
                            <div  class="w3-padding w3-theme-d2" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                                <div class="w3-col s1">
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Subject: <i>' . $row_Post['Subject'] . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>' . $Name_User . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>'.$row_Post['Date_Post'].'</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="w3-dark-grey" style="width: 95%;margin-left: 2.5%;padding-bottom: 3px;padding-top: 3px">
                            <div title="LIKE" class="fa fa-thumbs-up w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Like_Post'].' </div>
                            <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Dislike'].' </div>
                            ';
                    if($_SESSION['user'] == $Name_User2) {
                        echo '
                            <div class="delete_data w3-padding fa fa-trash w3-btn w3-red" style="margin-bottom: 5px" name="'.$row_Post['Subject'].'" id="'.$row_Post['Id'].'" value="pid=Department&uni='.$_GET['uni'].'&college='.$_GET['college'].'&dep='.$_GET['dep'].'"></div>
                        ';
                    }
                    echo '
                        </div>
                    ';
        }

    }else{
        echo '<div class="w3-center w3-text-red w3-padding-32 w3-xlarge"> No Posts</div>';
    }
          echo '
                </div>
                <!-- End Background Post For Doctor -->
            </div>
            <!-- End Middle column -->
        
        
            <!-- Right Column -->
            <div class="w3-col m4">
        
                <!-- Background Post -->
                <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin" style="width: 95%;min-height: 600px">
                    <!-- Border -->
                    <div class="w3-border-bottom"></div>
        
                    <!-- Head Posts -->
                    <div class="w3-display-container">
                        <div class="w3-display-topleft w3-dark-grey w3-padding" style="text-transform: uppercase;margin-top: 10px;width: 100%">Student</div>
                    </div>
        
                    <!-- Border -->
                    <div class="w3-border-bottom" style="margin-top: 13%"></div>
        ';

        //Post
        $sql_Post_User = "SELECT * FROM post WHERE Department_Id = $Id_Department $Sort";
        $result_Post = $con->query($sql_Post_User);
        if($result_Post->num_rows > 0) {
            while ($row_Post = $result_Post->fetch_assoc()) {

                //User
                $sql_User = "SELECT * FROM user WHERE  Id = $row_Post[User_Id] AND User_Type = 'user'";
                $result_user = $con->query($sql_User);
                if($result_user->num_rows > 0) {
                    while ($row_User = $result_user->fetch_assoc()) {
                        $Name_User = $row_User['User_Name'];
                    }
                }else{continue;}
                        echo '
                        <!-- Post -->
                        <div class="w3-row" style="margin-top: 15px; cursor: pointer" onclick="window.location.href=\'index.php?pid=Posts&uni=' . $Name_University . '&college=' . $Name_College . '&dep=' . $Name_Department . '&sub=' . $row_Post['Subject'] . '&post='.$row_Post['Id'].'\'">
                            <div  class="w3-padding w3-theme-d2" style="width: 95%; min-height: 110px;margin-left: 2.5%;">
                                <div class="w3-col s1">
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Subject: <i>' . $row_Post['Subject'] . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">writer: <i>' . $Name_User . '</i></div>
                                    <div class="w3-row s1 w3-text-light-gray w3-hover-text-black" style="text-align: left;margin: 5px;width: 1000px">Date: <i>'.$row_Post['Date_Post'].'</i></div>
                                </div>
                            </div>
                        </div>
                        <div class="w3-dark-grey" style="width: 95%;margin-left: 2.5%;padding-bottom: 3px;padding-top: 3px">
                                <div title="LIKE" class="fa fa-thumbs-up w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Like_Post'].' </div>
                                <div title="DISLIKE" class="fa fa-thumbs-down w3-large w3-dark-grey w3-padding" style="text-decoration: none;"> '.$row_Post['Dislike'].' </div>
                                ';
                if ($_SESSION['user'] == $Name_User) {
                    echo '
                                <div class="delete_data w3-padding fa fa-trash w3-btn w3-red" style="margin-bottom: 5px" name="'.$row_Post['Subject'].'" id="'.$row_Post['Id'].'" value="pid=Department&uni='.$_GET['uni'].'&college='.$_GET['college'].'&dep='.$_GET['dep'].'"></div>
                            ';
                }
                echo '
                            </div>
                    ';
            }
        }else{
            echo '<div class="w3-center w3-text-red w3-padding-32 w3-xlarge"> No Posts</div>';
        }

        echo '
                </div>
                <!-- End Background Post For Student -->
            </div>
            <!-- End Right column -->
        </div>
        ';
}

function CollegeOprations($Name_University){

    $con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

    // University
    $sql_University = "SELECT * FROM university WHERE Name = '$Name_University'";
    $result_University = $con->query($sql_University);
    if($result_University->num_rows > 0) {
        while ($row_University = $result_University->fetch_assoc()) {
            $Id_University = $row_University['Id'];
        }
    }
        echo '
                <div class="w3-margin-top w3-margin-left w3-padding-small w3-hover-text-gray w3-text-blue">
                    <a href="index.php?pid=Home" style="text-transform: uppercase">Home</a> -
                    <a href="index.php#University" style="text-transform: uppercase">'. $Name_University .'</a> - COLLEGES
                </div>
                <div class="w3-row">
            ';

        //College
        $sql_College = "SELECT * FROM college WHERE University_Id = $Id_University";
        $result_college = $con->query($sql_College);
        if($result_college->num_rows > 0) {
            while ($row_College = $result_college->fetch_assoc()) {
                $Id_College = $row_College['Id'];
                $Name_College = $row_College['Name'];

            // Department
            $sql_Department = "SELECT * FROM department WHERE College_Id = $Id_College ";
            $result_Department = $con->query($sql_Department);
            if ($result_Department->num_rows > 0) {
                echo '
                    <!-- Grid -->
                    <div class="w3-col m4" style="min-height: 300px">
                        <div class="w3-row-padding w3-margin-bottom w3-margin" id="plans">
                                <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                                   <li class="w3-theme-d2 w3-large w3-padding-32">College of ' . $Name_College . '</li>
                    ';
                                    while ($row_Department = $result_Department->fetch_assoc()) {
                                        $Name_Department = $row_Department['Name'];
                                        echo '
                                            <li class="w3-padding-16"><a href="index.php?pid=Department&uni=' . $Name_University . '&college=' . $Name_College . '&dep=' . $Name_Department . '"><b>' . $Name_Department . '</b></a></li>            
                                             ';
                }
                echo '
                                </ul>
                        </div>
                     </div>
                    ';
            }
        }
        echo '</div>';
    }else {
            echo '<div class="w3-text-red w3-padding-48 w3-center" style="margin-top: 12%; margin-bottom: 20%;font-size: 40px; text-transform: uppercase">' . $Name_University . ' It currently has no colleges</div>';
        }
    mysqli_close($con);
}

function HomeOprations(){

    if (empty($_GET['page'])) {
        $_GET['page'] = '1';
    }

    $con = new mysqli('localhost', 'root','' , 'db_iebook_8003115736_v');

    $results_per_page = 6;

    isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;

    if ($page > 1) {
        $this_page_first_result = ($page * $results_per_page) - $results_per_page;
    } else {
        $this_page_first_result = 0;
    }


    $sql_ads = "SELECT * FROM Ads";
    $result_Ads = $con->query($sql_ads);
    if($result_Ads->num_rows > 0){
        while ($row_Ads = $result_Ads->fetch_assoc()){
            echo '
                <div class="w3-col m2">
                    <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin-top" style="width: 240px;height: 630px">
                        <div><img src="Images/'.$row_Ads['Image'].'" alt="advertising" /></div>
                    </div>
                </div>
            ';
            }
        }
        echo '
        
        <!-- Page content -->
        <div class="w3-col m8">
            <div class="w3-container w3-card-2 w3-white w3-round" style="max-width:1050px;margin: 16px 16px 16px 37px;">
        
                <!-- University Section -->
                <div class="w3-container w3-padding-32" style="text-transform: uppercase;" id="University">
                    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">University</h3>
                </div>
                <div class="w3-row-padding" style="margin-left: 5%; margin-bottom: 5%">
        ';

    $sql = "SELECT * FROM university";
    $result = $con->query($sql);
    //universites
    $number_of_results = $result->num_rows;
    $totalPages = $number_of_results / $results_per_page;


    $sql = "SELECT * FROM university LIMIT $this_page_first_result, $results_per_page";
    $result = $con->query($sql);
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo '
                    <div class="w3-col l3 m6 w3-margin-bottom" style="margin: 0 20px 0 20px">
                        <div class="w3-display-container">
                            <div class="w3-display-topleft w3-black w3-padding" style="text-transform: uppercase;">' . $row['Name'] . '</div>
                                 <img src="Images/' . $row['Image'] . '" alt="' . $row['Name'] . '" onclick="window.location.href=\'index.php?pid=Colleges&uni=' . $row['Name'] . '\'" style="margin-left: 20%;cursor: pointer; width:150px;height: 175px">
                            </div>
                        </div>
                ';
        }
    }
echo '
                </div>
            </div>
        </div>
';
    $sql_ads = "SELECT * FROM Ads";
    $result_Ads = $con->query($sql_ads);
    if($result_Ads->num_rows > 0){
        while ($row_Ads = $result_Ads->fetch_assoc()){
            echo '
                <div class="w3-col m2">
                    <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center w3-margin-top" style="width: 240px;height: 630px">
                        <div><img src="Images/'.$row_Ads['Image'].'" alt="advertising" /></div>
                    </div>
                </div>
            ';
        }
    }
    echo '
    <div class="div_page">
    ';

    $totalPages++;

    if ($page > 1) {
        print '<a style="margin: 2px;" id="Previous" class="page" href="index.php?pid=Author&page=' . $page = $page - 1 . '#University">Prev</a>';
    }

    for ($page = 1; $page <= $totalPages; $page++) {
        print '<a style="margin: 2px;" id="' . $page . '" class="page" href="index.php?pid=Author&page=' . $page . '#University">' . $page . '</a>';
    }

    $next = $_GET['page'] + 1;
    $page--;
    if ($_GET['page'] != $page) {
        print '<a style="margin: 2px;" id="Next" class="page" href="index.php?pid=Author&page=' . $next . '#University">Next</a>';
    }

    echo "
        </div>
        <script>
              document.getElementById('".$_GET['page']."').style.background = '#4D636F';
              document.getElementById('".$_GET['page']."').style.color = 'white';
          </script>
        ";
    mysqli_close($con);
}


?>