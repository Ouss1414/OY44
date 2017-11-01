<ol class="breadcrumb 2" >
    <li>
        <a href="ControlPanel.php?CP=home"><i class="fa-home"></i>Home</a>
    </li>
    <li class="active">
        <strong>Add Exercise</strong>
    </li>
</ol>

<div class="row">
    <h2 align="center">Exercises</h2>
    <button class="btn btn-green" style="margin-left: 85.4%;margin-bottom: 1.5%" onclick="location.href='ControlPanel.php?CP=Add_Exercise'">New Exercise</button>
    <div align="center">
        <table class="table-bordered text-center" width="90%">
            <tr class="theme-skins">
                <td style="padding: 5px">#</td>
                <td style="padding: 10px">Question</td>
                <td style="padding: 10px">Number of question</td>
                <td style="padding: 10px">Answer 1</td>
                <td style="padding: 10px">Answer 2</td>
                <td style="padding: 10px">Answer 3</td>
                <td style="padding: 10px">Answer 4</td>
                <td style="padding: 10px">Correct Answer</td>
                <td style="padding: 10px">Edit</td>
                <td style="padding: 10px">Delete</td>
            </tr>
            <?php
                Get_Exercise();
            ?>
        </table>
    </div>
</div>

<br />