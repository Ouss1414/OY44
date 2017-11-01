<ol class="breadcrumb 2" >
    <li>
        <a href="ControlPanel.php?CP=home"><i class="fa-home"></i>Home</a>
    </li>
    <li>
        <a href="ControlPanel.php?CP=Exercise"><i class="fa-home"></i>Exercise</a>
    </li>
    <li class="active">
        <strong>Edit Exercise</strong>
    </li>
</ol>

<div class="row" align="center">
    <h2 class="margin-bottom">Edit Exercise</h2>
    <?php
        Edit_Exercise();
    ?>
    <div align="center">
        <input type="submit" value="Update" name="<?= $_GET['Serial'] ?>" class="Update_Exercise btn btn-green" id=""/>
        <input type="reset" value="Reset" name="reset_book" class="btn btn-red margin-left"/>
    </div>
</div>

<hr />
