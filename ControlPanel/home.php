<?php

$user_name = $_SESSION['user'];
$Type='';

//user
$sql = "SELECT * FROM user WHERE User_Name='$user_name'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Type = $row['User_Type'];
    }
}
if ($Type == 'author'){

            echo '
<div class="row">

    <fieldset id="Control_University" class="padding-lg">
        <legend>Control Books</legend>
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book"></i></div>
                    <a href="ControlPanel.php?CP=Author_Manage_Book"><h3>Control Books</h3></a>
                    <p>You can control books on one click.</p>
                </div>
        
            </div>
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book"></i></div>
                    <a href="ControlPanel.php?CP=New-Book"><h3>New Book</h3></a>
                    <p>You can Upload books on one click.</p>
                </div>
        
            </div>
        
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book"></i></div>
                    <a href="ControlPanel.php?CP=Edit_Book"><h3>Update Book</h3></a>
                    <p>You can Update books on one click.</p>
                </div>
        
            </div>
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book"></i></div>
                    <a href="ControlPanel.php?CP=Exercise"><h3>Control Exercise</h3></a>
                    <p>You can control exercise on one click.</p>
                </div>
        
            </div>
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book"></i></div>
                    <a href="ControlPanel.php?CP=Add_Exercise"><h3>Add new Exercise</h3></a>
                    <p>You can Add new exercise on one click.</p>
                </div>
        
            </div>
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book"></i></div>
                    <a href="ControlPanel.php?CP=Edit_Exercise"><h3>Update Exercise</h3></a>
                    <p>You can Update exercise on one click.</p>
                </div>
        
            </div>
        
        </fieldset>
	
	<br>

</div>

<br />
            ';

}else if ($Type == 'dean') {

}else if ($Type == 'admin') {

    $count_users = '';
    $result_users = $con->query("SELECT * FROM user");
    if ($result_users->num_rows > 0){
        while ($row_users = $result_users->fetch_assoc()){
            $count_users++;
        }
    }

    $count_uni = '';
    $result_uni = $con->query("SELECT * FROM university");
    if ($result_uni->num_rows > 0){
        while ($row_uni = $result_uni->fetch_assoc()){
            $count_uni++;
        }
    }

    $count_book = '';
    $result_book = $con->query("SELECT * FROM book");
    if ($result_book->num_rows > 0){
        while ($row_book = $result_book->fetch_assoc()){
            $count_book++;
        }
    }
    echo '
                
<div class="row">
	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="'.$count_users.'" data-postfix="" data-duration="1500" data-delay="0">0</div>

			<h3>Registered users</h3>
			<p>This number is registered on the site.</p>
		</div>

	</div>

	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-graduation-cap"></i></div>
			<div class="num" data-start="0" data-end="'.$count_uni.'" data-postfix="" data-duration="1500" data-delay="600">0</div>

			<h3>Universities</h3>
			<p>This is number of universities in site.</p>
		</div>

	</div>

	<div class="clear visible-xs"></div>

	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-rss"></i></div>
			<div class="num" data-start="0" data-end="'.$count_book.'" data-postfix="" data-duration="1500" data-delay="1800">0</div>

			<h3>IEBook</h3>
			<p>This is number of books in site.</p>
		</div>

	</div>
	
	<div class="col-sm-3 col-xs-6">

		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="0" data-postfix="" data-duration="1500" data-delay="1200">0</div>

			<h3>New Messages</h3>
			<p>messages per day.</p>
		</div>

	</div>
</div>

<br />

<div class="row">

    <fieldset id="Control_University" class="padding-lg">
        <legend>Control University</legend>
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-graduation-cap"></i></div>
                    <a href="ControlPanel.php?CP=Control_University"><h3>Control University</h3></a>
                    <p>You can Add universities on one click.</p>
                </div>
        
            </div>
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-graduation-cap"></i></div>
                    <a href="ControlPanel.php?CP=Add_College"><h3>Add College</h3></a>
                    <p>You can Add colleges on one click.</p>
                </div>
        
            </div>
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-graduation-cap"></i></div>
                    <a href="ControlPanel.php?CP=Add_Department"><h3>Add Department</h3></a>
                    <p>You can Add Departments on one click.</p>
                </div>
        
            </div>
            
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-graduation-cap"></i></div>
                    <a href="ControlPanel.php?CP=Update_University"><h3>Update University</h3></a>
                    <p>You can Update universities on one click.</p>
                </div>
        
            </div>
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-graduation-cap"></i></div>
                    <a href="ControlPanel.php?CP=Update_College"><h3>Update College</h3></a>
                    <p>You can Update Colleges on one click.</p>
                </div>
        
            </div>
        
        </fieldset>
	
	<br>
	
	<fieldset id="Control_IEBook" class="padding-lg">
        <legend>Control IEBook</legend>
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book-open"></i></div>
                    <a href="ControlPanel.php?CP=Manage_Books"><h3>Manage Books</h3></a>
                    <p>You can Manage Books on one click.</p>
                </div>
        
            </div>
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book-open"></i></div>
                    <a href="ControlPanel.php?CP=Admin_Update_Book"><h3>Update Books</h3></a>
                    <p>You can Update Books on one click.</p>
                </div>
        
            </div>
        
    </fieldset>
    
    <br>

	<div class="clear visible-xs"></div>

	<fieldset id="Control_Users" class="padding-lg">
        <legend>Control Users</legend>
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book-open"></i></div>
                    <a href="ControlPanel.php?CP=Control_User"><h3>Control User</h3></a>
                    <p>You can Control Users on one click.</p>
                </div>
        
            </div>
            
            <div class="col-sm-4 col-xs-6">
        
                <div class="tile-stats w3-dark-gray">
                    <div class="icon"><i class="entypo-book-open"></i></div>
                    <a href="ControlPanel.php?CP=Add_User"><h3>Add User</h3></a>
                    <p>You can Add User on one click.</p>
                </div>
        
            </div>
        
    </fieldset>

</div>

<br />
';

}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px;  padding-bottom: 17%" align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>
