<?php

$user_name = $_SESSION['user'];
$Type='';
$user_id='';

//user
$sql = "SELECT * FROM user WHERE User_Name='$user_name'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Type = $row['User_Type'];
        $user_id=$row['Id'];
    }
}
if ($Type == 'author'){

    $result_book = $con->query("SELECT * FROM book WHERE User_Id=$user_id");
    if ($result_book->num_rows > 0) {

        echo '
               
<ol class="breadcrumb 2" >
    <li>
        <a href="ControlPanel.php?CP=home"><i class="fa-home"></i>Home</a>
    </li>
    <li class="active">
        <strong>Exercise</strong>
    </li>
</ol>
';

        $result_ex = $con->query("SELECT * FROM exercise WHERE User_Id=$user_id");
        if ($result_ex->num_rows > 0) {
            echo '

<div class="row">
    <h2 align="center">Exercises</h2>
    <button class="btn btn-green" style="margin-left: 85.4%;margin-bottom: 1.5%" onclick="location.href=\'ControlPanel.php?CP=Add_Exercise\'">New Exercise</button>
    <div align="center">
        <table class="table-bordered text-center" width="90%">
            <tr class="theme-skins">
                <td style="padding: 5px">#</td>
                <td style="padding: 10px">Question</td>
                <td style="padding: 10px; max-width: 60px">Number of question</td>
                <td style="padding: 10px">Book</td>
                <td style="padding: 10px">Answer 1</td>
                <td style="padding: 10px">Answer 2</td>
                <td style="padding: 10px">Answer 3</td>
                <td style="padding: 10px">Answer 4</td>
                <td style="padding: 10px">Correct Answer</td>
                <td style="padding: 10px">Edit</td>
                <td style="padding: 10px">Delete</td>
            </tr>
            ';
            Get_Exercise();
            echo '
        </table>
    </div>
</div>

<br />
';
        } else {
            echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have any Exercises, please Add new Exercise on click.</div>';
            echo '<div style="margin-top: 20px;  padding-bottom: 17%" align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Add_Exercise">Add Exercise</a></div>';
        }
    } else {
        echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have any book, please Upload new book on click.</div>';
        echo '<div style="margin-top: 20px;  padding-bottom: 17%" align="center"><a class="btn btn-green" href="ControlPanel.php?CP=New-Book">New Book</a></div>';
    }
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px;  padding-bottom: 17%" align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>