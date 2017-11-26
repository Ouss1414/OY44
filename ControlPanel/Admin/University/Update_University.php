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
<ol class="breadcrumb 2" >
    <li>
        <a href="ControlPanel.php?CP=home"><i class="fa-home"></i>Home</a>
    </li>
    <li class="active">
        <strong>Update University</strong>
    </li>
</ol>

<div class="row">
    <h2 class="margin-bottom" align="center">Update University</h2>	

		

			    <table class="table" style="max-width: 70%">
			    
			    <tr>
                            <td><label for="Name_uni"><span style="color: red">*</span> Choose University: </label></td>
                            <td>
                                <select name="Name_uni" class="form-control" id="Name_uni" onchange="location.href=\'ControlPanel.php?CP=Update_University&uni=\'+this.value">
                                <option value="">Choose University</option>
                                ';
    $result_uni = $con->query("SELECT * FROM university");
    if($result_uni->num_rows > 0){
        while ($row_uni = $result_uni->fetch_assoc()){
            if ($_GET['uni'] == $row_uni['Name']) {
                echo '
              <option selected value="' . $row_uni['Name'] . '">' . $row_uni['Name'] . '</option>
              ';
            }else {
                echo '
              <option value="' . $row_uni['Name'] . '">' . $row_uni['Name'] . '</option>
               ';
            }
        }
    }
    echo '
                                </select>
                            </td>
                        </tr>
                        
                        ';
    $result_uni = $con->query("SELECT * FROM university WHERE Name='$_GET[uni]'");
    if($result_uni->num_rows > 0) {
        while ($row_uni = $result_uni->fetch_assoc()) {
            echo '
                        <tr>
                            <td><label for="Name_uni"><span style="color: red">*</span> Name of University: </label></td>
                            <td><input type="text" class="form-control" name="Name_uni" id="Name_uni" value="'.$row_uni['Name'].'" placeholder="Name of university" autofocus required></td>
                        </tr>
            
                        <tr>
                            <td><label for="upload_pic_uni"><span style="color: red">*</span> Upload Picture of University: </label></td>
                            <td>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                    <img src="Images/'.$row_uni['Image'].'" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="Image_Uni" id="Image_Uni" accept="image/*" required>
                                        </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                                <p style="color: red;">* Only images [JPG,JPEG,JPG2,PNG,GIF].</p>
                            </td>
                        </tr>
            
                    </table>
                    ';
        }
    }
    echo '
                    <div align="center">
                        <input type="submit" value="Update University" name="Update_University" class="Update_University btn btn-green"/>
                        <input type="reset" value="Reset" name="reset_uni" class="btn btn-red margin-left"/>
                    </div>
</div>

<hr />
    ';
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}


?>