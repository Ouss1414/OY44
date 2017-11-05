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

<div class="row" align="center">
    <h2 class="margin-bottom">New Exercise</h2>
        <table class="table" style="max-width: 70%">
            <?php
                Get_Id_book();
            ?>
            <script>
                function Id_Book() {
                    if (document.getElementById("books").value != "") {
                    var dop = document.getElementById("books").value;
                    }
                    location.href="ControlPanel.php?CP=Add_Exercise&Serial=" + dop;
                }
            </script>
            <tr>
                <td><label for="Num_Question">Question number: </label></td>
                <td><input type="number" class="form-control" name="Num_Question" id="Num_Question" placeholder="Question number?" style="max-width: 50%" autofocus required></td>
            </tr>

            <tr>
                <td><label for="Question">Question: </label></td>
                <td><input type="text" class="form-control" name="Question" id="Question" placeholder="Question?" required></td>
            </tr>

            <tr>
                <td><label for="Answer_1">Answer 1: </label></td>
                <td>
                    <input type="text" class="form-control" name="Answer_1" id="Answer_1" placeholder="Answer 1" style="max-width: 70%; display: inline;margin-right: 5px" required>
                    <label><input type="radio" name="Q_Answer" class="Q_Answer" value="1" required> Correct answer!</label>
                </td>
            </tr>

            <tr>
                <td><label for="Answer_2">Answer 2: </label></td>
                <td>
                    <input type="text" class="form-control" name="Answer_2" id="Answer_2" placeholder="Answer 2" style="max-width: 70%; display: inline;margin-right: 5px" required>
                    <label><input type="radio" name="Q_Answer" class="Q_Answer" value="2" required> Correct answer!</label>
                </td>
            </tr>

            <tr>
                <td><label for="Answer_3">Answer 3: </label></td>
                <td>
                    <input type="text" class="form-control" name="Answer_3" id="Answer_3" placeholder="Answer 3" style="max-width: 70%; display: inline;margin-right: 5px" required>
                    <label><input type="radio" name="Q_Answer" class="Q_Answer" value="3" required> Correct answer!</label>
                </td>
            </tr>

            <tr>
                <td><label for="Answer_4">Answer 4: </label></td>
                <td>
                    <input type="text" class="form-control" name="Answer_4" id="Answer_4" placeholder="Answer 4" style="max-width: 70%; display: inline;margin-right: 5px" required>
                    <label><input type="radio" name="Q_Answer" class="Q_Answer" value="4" required> Correct answer!</label>

                </td>
            </tr>

        </table>

        <div align="center">
            ';
            if(!empty($_GET['Serial'])){
                $Serial_Book = $_GET['Serial'];
            }else{
                $Serial_Book = "<script>getElementById('books').val();</script>";
            }
            echo'
            <input type="submit" value="Add" name="<?= $Serial_Book ?>" class="Add_Exercise btn btn-green" id="'. $_SESSION['user'] .'"/>
            <input type="reset" value="Reset" name="reset_book" class="btn btn-red margin-left"/>
        </div>
</div>

<hr />
    ';
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>