<?php
	$sql_sua_bv = "SELECT * FROM tbl_tintuc WHERE id='$_GET[idtintuc]' LIMIT 1";
	$query_sua_bv = mysqli_query($mysqli,$sql_sua_bv);
?>
<p><b>Sửa tin tức</b></p>
<table class="table hover table-dark" border="1" width="100%" style="border-collapse: collapse;">
    <?php
while($row = mysqli_fetch_array($query_sua_bv)) {
?>
    <form method="POST" action="modules/quanlytintuc/xuly.php?idtintuc=<?php echo $row['id'] ?>"
        enctype="multipart/form-data">
        <tr>
            <td>Tên tin tức</td>
            <td><input type="text" value="<?php echo $row['tentintuc'] ?>" name="tentintuc"></td>
        </tr>

        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh">
                <img src="modules/quanlytintuc/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
            </td>

        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea rows="10" name="tomtat" style="resize: none"><?php echo $row['tomtat'] ?></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows="10" name="noidung" style="resize: none"><?php echo  $row['noidung'] ?></textarea></td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <?php
	    		if($row['tinhtrang']==1){ 
	    		?>
                    <option value="1" selected>Kích hoạt</option>
                    <option value="0">Ẩn</option>
                    <?php
	    		}else{ 
	    		?>
                    <option value="1">Kích hoạt</option>
                    <option value="0" selected>Ẩn</option>
                    <?php
	    		} 
	    		?>

                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suatintuc" value="Sửa tin tức"></td>
        </tr>
    </form>
    <?php
 } 
 ?>

</table>