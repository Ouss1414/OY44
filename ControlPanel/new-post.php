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
	if ($Type == 'dean'){
		echo '
			<h1 class="margin-bottom">Add New Post</h1>
				<ol class="breadcrumb 2" >
					<li>
						<a href="ControlPanel.php?CP=home"><i class="fa-home"></i>Home</a>
					</li>
					<li class="active">
						<strong>New Post</strong>
					</li>
				</ol>
			
			<br />
					
			<style>
					.ms-container .ms-list {
						width: 135px;
						height: 205px;
					}
					
					.post-save-changes {
						float: right;
					}
					
					@media screen and (max-width: 789px)
					{
						.post-save-changes {
							float: none;
							margin-bottom: 20px;
						}
					}
					</style>
					
			<form method="post" role="form">
			
				<!-- Title and Publish Buttons -->
				<div class="row">
					<div class="col-sm-2 post-save-changes">
						<button type="button" class="btn btn-green btn-lg btn-block btn-icon">
							Publish
							<i class="entypo-check"></i>
						</button>
					</div>
			
					<div class="col-sm-10">
						<input type="text" class="form-control input-lg" name="post_title" placeholder="Post title" />
					</div>
				</div>
			
				<br />
			
				<!-- WYSIWYG - Content Editor -->
				<div class="row">
					<div class="col-sm-12">
						<textarea class="form-control wysihtml5" rows="18" data-stylesheet-url="assets/css/wysihtml5-color.css" name="post_content" id="post_content"></textarea>
					</div>
				</div>
			
				<br />
			
				<!-- Metaboxes -->
				<div class="row">
					<!-- Metabox :: Featured Image -->
					<div class="col-sm-4">
			
						<div class="panel panel-primary" data-collapsed="0">
			
							<div class="panel-heading">
								<div class="panel-title">
									Featured Image
								</div>
			
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
								</div>
							</div>
			
							<div class="panel-body">
			
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
										<img src="http://placehold.it/320x160" alt="...">
									</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px"></div>
									<div>
										<span class="btn btn-white btn-file">
											<span class="fileinput-new">Select image</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="..." accept="image/*">
										</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
			
							</div>
			
						</div>
			
					</div>
				</div>
			</form>
		';
	}
?>
