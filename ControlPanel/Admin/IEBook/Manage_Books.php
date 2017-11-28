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
if ($Type == 'admin'){

    echo '
      <div class="row">
	    <h2 align="center">The Book</h2>
    
	<div align="center">
		<table class="table-bordered text-center" width="90%">
			<tr class="theme-skins">
				<td style="padding: 5px">#</td>
				<td style="padding: 10px">Serial</td>
				<td style="padding: 10px">Book</td>
				<td style="padding: 10px">Price</td>
				<td style="padding: 10px">Author name</td>
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
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>