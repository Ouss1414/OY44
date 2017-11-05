<ol class="breadcrumb 2" >
	<li>
		<a href="ControlPanel.php?CP=home"><i class="fa-home"></i>Home</a>
	</li>
	<li class="active">
		<strong>File Upload</strong>
	</li>
</ol>

<div class="row" align="center">
	<h2 class="margin-bottom">New Book</h2>
    <form action="System/Upload_book.php" method="post" enctype="multipart/form-data">
		<table class="table" style="max-width: 60%">
			<tr>
				<td><label for="Serial">Serial book: </label></td>
				<td><input type="text" class="form-control" name="Serial" id="Serial" placeholder="Serial number" autofocus required></td>
			</tr>

			<tr>
				<td><label for="Name_book">Name book: </label></td>
				<td><input type="text" class="form-control" name="Name_book" id="Name_book" placeholder="Name book" required></td>
			</tr>

			<tr>
				<td><label for="Page_book"  >Pages: </label></td>
				<td><input type="number" class="form-control" name="Page_book" id="Page_book" placeholder="Number only"  required></td>
			</tr>

			<tr>
				<td><label for="Price_book"  >Price: </label></td>
				<td>
					<input type="number" class="form-control" name="Price_book" id="Price_book" placeholder="Free">
					<p style="color: red">* If it's FREE please don't add a value.</p>
				</td>
			</tr>

			<tr>
				<td><label for="Catagories_book"  >Catagories: </label></td>
				<td>
                    <select class="form-control" name="catagories_book" id="catagories_book">
                        <option>Choose one...</option>
                    <?php
                        select_catagories();
                    ?>
                    </select>
                </td>
			</tr>

			<tr>
				<td><label for="Available_book">Available book: </label></td>
				<td><label><input type="radio" value="1" name="Available_book" class="Available_book" checked required> Yes</label></br>
					<label><input type="radio" value="0" name="Available_book" class="Available_book" required> No</label></td>
			</tr>

			<tr>
				<td><label for="File_book">File book: </label></td>
				<td><div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
						<div style="margin-top: 30%; font-size: 24px">Click Here</div>
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
					<div>
                            <span class="btn btn-white btn-file">
                                <span class="fileinput-new">Select File</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="File_book" id="File_book" accept="application/pdf" required>
                            </span>
						<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
					</div>
				</div>
                    <p style="color: red;">* Only files [PDF].</p>
				</td>
			</tr>

			<tr>
				<td><label for="Image_book">Image book: </label></td>
				<td><div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
						<img src="http://placehold.it/200x150" alt="...">
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
					<div>
                            <span class="btn btn-white btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="Image_book" id="Image_book" accept="image/*" required>
                            </span>
						<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
					</div>
				</div>
					<p style="color: red;">* Only images [JPG,JPEG,JPG2,PNG,GIF].</p>
				</td>
			</tr>

			<tr>
				<td><label for="Summary_book"  >Summary: </label></td>
				<td><textarea class="form-control" name="Summary_book" id="Summary_book" placeholder="Summary" rows="5" style="resize: none" ></textarea></td>
			</tr>

		</table>
		<div align="center">
			<input type="submit" value="Upload" name="Upload_book" class="Upload_book btn btn-green"/>
			<input type="reset" value="Reset" name="reset_book" class="btn btn-red margin-left"/>
		</div>
    </form>
</div>

<hr />
