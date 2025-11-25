
<?php
//Form phải có thuộc tính enctype="multipart/form-data"
//Phương thức phải là POST
?>

<form action="upload_handle_file_img.php" method="post" enctype="multipart/form-data">

    <label for="myfile">chọn file cần tải lên</label>

    <input type="file" name="myfile">
    <input type="submit" value="Submit">
</form>