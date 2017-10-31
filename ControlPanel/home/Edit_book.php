<div class="row" align="center">
    <h2 class="margin-bottom">Edit Book (##########)</h2>
    <form>
        <table class="table">
            <tr>
                <td><label for="Serial">Serial book: </label></td>
                <td><input type="text" value="" class="form-control" name="Serial" placeholder="Serial number" required></td>
            </tr>

            <tr>
                <td><label for="Name_book">Name book: </label></td>
                <td><input type="text" value="" class="form-control" name="Name_book" placeholder="Name book" required></td>
            </tr>

            <tr>
                <td><label for="Page_book"  >Pages: </label></td>
                <td><input type="number" value="" class="form-control" name="Page_book" placeholder="Number only"  required></td>
            </tr>

            <tr>
                <td><label for="Price_book"  >Price: </label></td>
                <td><input type="number" value="" class="form-control" name="Price_book" placeholder="Free"></td>
                <td><p style="color: red">* If it's FREE please don't add a value.</p></td>
            </tr>

            <tr>
                <td><label for="Catagories_book"  >Catagories: </label></td>
                <td><select class="form-control" name="catagories_book">
                        <option>Choose one...</option>
                        <option value="Sport">Sport</option>
                        <option value="Sport">Programing</option>
                        <option value="Sport">History</option>
                        <option value="Sport">Cars</option>
                        <option value="Sport">Math</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="Available_book">Available book: </label></td>
                <td><label><input type="radio" value="1" name="Available_book" checked required> Yes</label></br>
                    <label><input type="radio" value="0" name="Available_book" required> No</label></td>
            </tr>

            <tr>
                <td><label for="File_book">File book: </label></td>
                <td><div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                            <img src="http://placehold.it/200x150" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                        <div>
                            <span class="btn btn-white btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="File_book" accept="image/*" required>
                            </span>
                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
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
                                <input type="file" name="Image_book" accept="image/*" required>
                            </span>
                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td><label for="Summary_book"  >Summary: </label></td>
                <td><textarea value="" class="form-control" name="Summary_book" placeholder="Summary" rows="5" style="resize: none" required></textarea></td>
            </tr>

        </table>

        <div align="center">
            <input type="submit" value="Update" name="Update_book" class="btn btn-green"/>
            <input type="reset" value="Reset" name="reset_book" class="btn btn-red margin-left"/>
        </div>
    </form>
</div>

<br />
