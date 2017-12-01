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

    echo'
<div class="row">
<form action="System/Upload_ADs.php" method="post" enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="form-group col-md-2" style="margin-left: 10%">
            <lable for="Advertiser"><span style="color: red">*</span> Advertiser:</lable>    
        </div>
        
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="Advertiser" required>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group col-md-2" style="margin-left: 10%">
            <lable for="Subject_ADs"><span style="color: red">*</span> Subject of ADs:</lable>    
        </div>
        
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="Subject_ADs" required>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group col-md-2" style="margin-left: 10%">
            <lable for="From_Date"><span style="color: red">*</span> From Date:</lable>    
        </div>
        
        <div class="form-group col-md-6">
            <input type="date" class="form-control" name="From_Date" required>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group col-md-2" style="margin-left: 10%">
            <lable for="To_Date"><span style="color: red">*</span> To Date:</lable>    
        </div>
        
        <div class="form-group col-md-6">
            <input type="date" class="form-control" name="To_Date" required>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group col-md-2" style="margin-left: 10%">
            <lable for="Price"><span style="color: red">*</span> Price:</lable>    
        </div>
        
        <div class="form-group col-md-6">
            <input type="number" class="form-control" name="Price" required>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group col-md-2" style="margin-left: 10%">
            <label for="Image_book"><span style="color: red">*</span> Image book: </label>   
        </div>
        
        <div class="form-group col-md-6">
            <div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
						<img src="http://placehold.it/200x150" alt="...">
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
					<div>
                            <span class="btn btn-white btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="Image_ADs" id="Image_ADs" accept="image/*" required>
                            </span>
						<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
					</div>
				</div>
					<p style="color: red;">* Only images [JPG,JPEG,JPG2,PNG,GIF].</p>
        </div>
    </div>
    
    <div align="center">
			<input type="submit" value="Upload ADs" name="Upload_ADs" class="Upload_ADs btn btn-green"/>
			<input type="reset" value="Reset" name="reset_book" class="btn btn-red margin-left"/>
		</div>
    </form>
</div>
    ';

}else{
    echo '<div style="font-size: 32px; font-family: Tahoma; margin-top: 20%" align="center">Sorry, You do not have permission to access this page.</div>';
    echo '<div style="margin-top: 20px; padding-bottom: 17%" " align="center"><a class="btn btn-green" href="ControlPanel.php?CP=Home">Home</a></div>';

}

?>