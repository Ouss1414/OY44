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
if ($Type == 'author') {

    $result_book = $con->query("SELECT * FROM book WHERE User_Id=$user_id");
    if ($result_book->num_rows > 0) {

        echo '
<ol class="breadcrumb 2" >
    <li>
        <a href="ControlPanel.php?CP=home"><i class="fa-home"></i>Home</a>
    </li>
    <li>
        <a href="ControlPanel.php?CP=Exercise"><i class="fa-home"></i>Exercise</a>
    </li>
    <li class="active">
        <strong>New Exercise</strong>
    </li>
</ol>
';
        echo '
        <table class="table" style="max-width: 70%">
                        <tr>
                            <td><label for="Name_book"><span style="color: red">*</span> Choose Book: </label></td>
                            <td>
                                <select name="Name_book" class="form-control" id="Name_book" onchange="location.href=\'ControlPanel.php?CP=Add_Exercise&Serial=\'+this.value">
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
        if (!empty($_GET['Serial'])) {
            if ($_GET['Serial'] == $serial_Book) {
                echo '
<div class="row" align="center">
    <h2 class="margin-bottom">New Exercise</h2>
        <table class="table" style="max-width: 70%">
            <tr>
                <td><label for="Num_Question"><span style="color: red">*</span> Question number: </label></td>
                <td><input type="number" class="form-control" name="Num_Question" id="Num_Question" placeholder="Question number?" style="max-width: 50%" autofocus required></td>
            </tr>

            <tr>
                <td><label for="Question"><span style="color: red">*</span> Question: </label></td>
                <td><input type="text" class="form-control" name="Question" id="Question" placeholder="Question?" required></td>
            </tr>

            <tr>
                <td><label for="Answer_1"><span style="color: red">*</span> Answer 1: </label></td>
                <td>
                    <input type="text" class="form-control" name="Answer_1" id="Answer_1" placeholder="Answer 1" style="max-width: 70%; display: inline;margin-right: 5px" required>
                    <label><input type="radio" name="Q_Answer" class="Q_Answer" value="1" required> Correct answer!</label>
                </td>
            </tr>

            <tr>
                <td><label for="Answer_2"><span style="color: red">*</span> Answer 2: </label></td>
                <td>
                    <input type="text" class="form-control" name="Answer_2" id="Answer_2" placeholder="Answer 2" style="max-width: 70%; display: inline;margin-right: 5px" required>
                    <label><input type="radio" name="Q_Answer" class="Q_Answer" value="2" required> Correct answer!</label>
                </td>
            </tr>

            <tr>
                <td><label for="Answer_3"><span style="color: red">*</span> Answer 3: </label></td>
                <td>
                    <input type="text" class="form-control" name="Answer_3" id="Answer_3" placeholder="Answer 3" style="max-width: 70%; display: inline;margin-right: 5px" required>
                    <label><input type="radio" name="Q_Answer" class="Q_Answer" value="3" required> Correct answer!</label>
                </td>
            </tr>

            <tr>
                <td><label for="Answer_4"><span style="color: red">*</span> Answer 4: </label></td>
                <td>
                    <input type="text" class="form-control" name="Answer_4" id="Answer_4" placeholder="Answer 4" style="max-width: 70%; display: inline;margin-right: 5px" required>
                    <label><input type="radio" name="Q_Answer" class="Q_Answer" value="4" required> Correct answer!</label>

                </td>
            </tr>

        </table>

        <div align="center">
            <input type="submit" value="Add" name="<?= $Serial_Book ?>" class="Add_Exercise btn btn-green" id="' . $_SESSION['user'] . '"/>
            <input type="reset" value="Reset" name="reset_book" class="btn btn-red margin-left"/>
        </div>
</div>

<hr />
    ';
            } else {
                echo '<script>location.href="ControlPanel.php?CP=Add_Exercise"</script>';
            }
        }
    } else {
        echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have any book, please Upload new book on click.</div>';
        echo '<div style="margin-top: 20px;  padding-bottom: 17%" align="center"><a class="btn btn-green" href="ControlPanel.php?CP=New-Book">New Book</a></div>';
    }
} else {
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>