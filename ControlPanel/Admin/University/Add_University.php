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
        <strong>Add University</strong>
    </li>
</ol>

<div class="row">
    <h2 class="margin-bottom" align="center">Add University</h2>	
    
        <form id="rootwizard" method="post" action="System/Add_university.php" class="form-horizontal form-wizard" enctype="multipart/form-data">

			<div class="steps-progress">
				<div class="progress-indicator"></div>
			</div>

			<ul>
				<li class="active">
					<a href="#tab1" data-toggle="tab"><span>1</span>First</a>
				</li>
				<li>
					<a href="#tab2" data-toggle="tab"><span>2</span>Second</a>
				</li><li>
					<a href="#tab3" data-toggle="tab"><span>3</span>Third</a>
				</li>
			</ul>

			<div class="tab-content">

				<div class="tab-pane active" id="tab1" align="center">
				     <table class="table" style="max-width: 70%">
                        <tr>
                            <td><label for="Name_uni"><span style="color: red">*</span> Name of University: </label></td>
                            <td><input type="text" class="form-control" name="Name_uni" id="Name_uni" placeholder="Name of university" autofocus required></td>
                        </tr>
            
                        <tr>
                            <td><label for="upload_pic_uni"><span style="color: red">*</span> Upload Picture of University: </label></td>
                            <td>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                                    <img src="http://placehold.it/200x150" alt="...">
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
                </div>
                
				<div class="tab-pane" id="tab2" align="center">
				    <table class="table" style="max-width: 70%">
                        <tr>
                           <td><label for="Name_college"><span style="color: red">*</span> Name of College: </label></td>
                           <td><input type="text" class="form-control" name="Name_college" id="Name_college" placeholder="Name of College" autofocus required></td>
                        </tr>
                    </table>
                    
                </div>
                
                <div class="tab-pane" id="tab3" align="center">
				    
                    <table id="AddDepartmentGroup" class="table" style="max-width: 70%">
                        
                            <div id="AddDepartment1">
                                <tr id="AddDepartment1">
                                    <td><label for="Name_dep"><span style="color: red">*</span> Name of Department 1: </label></td>
                                    <td><input type="text" class="form-control" name="Name_dep1" id="Name_dep1" placeholder="Name of Department" autofocus required></td>
                                </tr>
                            </div>
                    </table>
                    
                    <table class="table" style="max-width: 70%">
                        <tr>
                            <td><a id="addButtondep" style="cursor: pointer">+ Add more department ... </a></td>
                            <td><a id="removeButtondep" style="cursor: pointer">- Remove text filed</a></td>
                        </tr>
                    </table>
                    
                    <div align="center">
                        <input type="submit" value="Add University" name="Add_University" class="Add_University btn btn-green"/>
                        <input type="reset" value="Reset" name="reset_uni" class="btn btn-red margin-left"/>
                    </div>
                </div>
                

				<ul class="pager wizard">
					<li class="previous first">
						<a href="#">First</a>
					</li>
					<li class="previous">
						<a href="#"><i class="entypo-left-open"></i> Previous</a>
					</li>

					<li class="next last">
						<a href="#">Last</a>
					</li>
					<li class="next">
						<a href="#">Next <i class="entypo-right-open"></i></a>
					</li>
				</ul>

			</div>
		</form>

</div>

<hr />
    ';
}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}


?>