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
        $user_id = $row['Id'];
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
                <strong>Edit Book</strong>
            </li>
        </ol>
        
        ';

        echo '
        <table class="table" style="max-width: 70%">
                        <tr>
                            <td><label for="Name_book"><span style="color: red">*</span> Choose Book: </label></td>
                            <td>
                                <select name="Name_book" class="form-control" id="Name_book" onchange="location.href=\'ControlPanel.php?CP=Edit_Book&Serial=\'+this.value">
                                <option value="">Choose Book</option>
        ';
        $serial_Book = '';
        $result_book = $con->query("SELECT * FROM book");
        if ($result_book->num_rows > 0) {
            while ($row_book = $result_book->fetch_assoc()) {
                if ($_GET['Serial'] == $row_book['Serial']) {
                    echo '
                        <option selected value="' . $row_book['Serial'] . '">' . $row_book['Name_Book'] . '</option>
                        ';
                    $serial_Book = $row_book['Serial'];
                } else {
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
        if (isset($_GET['Serial'])) {
            if ($_GET['Serial'] == $serial_Book) {
                Edit_Book();
                echo '
        <br />
        ';
            } else {
                echo '<script>location.href="ControlPanel.php?CP=Edit_Book"</script>';
            }
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