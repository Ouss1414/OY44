<?php

$user_name = $_SESSION['user'];
$Type='';
$user_id = '';

//user
$sql = "SELECT * FROM user WHERE User_Name='$user_name'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Type = $row['User_Type'];
        $user_id = $row['Id'];
    }
}
if ($Type == 'author'){

    $result_book = $con->query("SELECT * FROM book WHERE User_Id=$user_id");
    if ($result_book->num_rows > 0) {

    echo '
                
<!--<div class="row">-->
<!--	<div class="col-sm-3 col-xs-6">-->
<!---->
<!--		<div class="tile-stats tile-red">-->
<!--			<div class="icon"><i class="entypo-users"></i></div>-->
<!--			<div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">0</div>-->
<!---->
<!--			<h3>Registered users</h3>-->
<!--			<p>so far in our blog, and our website.</p>-->
<!--		</div>-->
<!---->
<!--	</div>-->
<!---->
<!--	<div class="col-sm-3 col-xs-6">-->
<!---->
<!--		<div class="tile-stats tile-green">-->
<!--			<div class="icon"><i class="entypo-chart-bar"></i></div>-->
<!--			<div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1500" data-delay="600">0</div>-->
<!---->
<!--			<h3>Daily Visitors</h3>-->
<!--			<p>this is the average value.</p>-->
<!--		</div>-->
<!---->
<!--	</div>-->
<!---->
<!--	<div class="clear visible-xs"></div>-->
<!---->
<!--	<div class="col-sm-3 col-xs-6">-->
<!---->
<!--		<div class="tile-stats tile-aqua">-->
<!--			<div class="icon"><i class="entypo-mail"></i></div>-->
<!--			<div class="num" data-start="0" data-end="23" data-postfix="" data-duration="1500" data-delay="1200">0</div>-->
<!---->
<!--			<h3>New Messages</h3>-->
<!--			<p>messages per day.</p>-->
<!--		</div>-->
<!---->
<!--	</div>-->
<!---->
<!--	<div class="col-sm-3 col-xs-6">-->
<!---->
<!--		<div class="tile-stats tile-blue">-->
<!--			<div class="icon"><i class="entypo-rss"></i></div>-->
<!--			<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">0</div>-->
<!---->
<!--			<h3>Subscribers</h3>-->
<!--			<p>on our site right now.</p>-->
<!--		</div>-->
<!---->
<!--	</div>-->
<!--</div>-->
<!---->
<!--<br />-->
<!---->
<!--<hr>-->
<div class="row">
	    <h2 align="center">Your Book</h2>
    <div class="row" style="margin-left: 80.4%; margin-bottom: 1.5%">
            <button class="btn btn-green" onclick="location.href=\'ControlPanel.php?CP=Exercise\'">Exercise</button>
            <button class="btn btn-green" onclick="location.href=\'ControlPanel.php?CP=New-Book\'">New Book</button>
    </div>
	<div align="center">
		<table class="table-bordered text-center" width="90%">
			<tr class="theme-skins">
				<td style="padding: 5px">#</td>
				<td style="padding: 10px">Serial</td>
				<td style="padding: 10px">Book</td>
				<td style="padding: 10px">Price</td>
				<td style="padding: 10px">Add Exercise</td>
				<td style="padding: 10px">Edit</td>
				<td style="padding: 10px">Delete</td>
			</tr>
            ';
    Get_books();
    echo '
		</table>
	</div>
</div>

<br />
            ';
    } else {
        echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have any book, please Upload new book on click.</div>';
        echo '<div style="margin-top: 20px;  padding-bottom: 17%" align="center"><a class="btn btn-green" href="ControlPanel.php?CP=New-Book">New Book</a></div>';
    }
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px;  padding-bottom: 17%" align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>
