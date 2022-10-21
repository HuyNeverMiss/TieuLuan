<?php
    $sql_sua_sp = "SELECT * FROM tbl_nhaphang WHERE id_nhaphang='$_GET[idnhaphang]' LIMIT 1";
    $query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>
<p style="font-size: 20px;"><b>Sửa sản phẩm</b></p>
<table class="table table-hover table-dark" border="1px" style="width: 100%;" style="border-collapse: collapse;">
    <?php
  while($row = mysqli_fetch_array($query_sua_sp)){
?>
    <form method="POST" action="modules/quanlynhaphang/xuly.php?idnhaphang=<?php echo $row['id_nhaphang']?>"
        enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Giá nhập</td>
            <td><input type="text" value="<?php echo $row['gianhap'] ?>" name="gianhap"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" value="<?php echo $row['soluong1'] ?>" name="soluong1"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh">
                <img src="modules/quanlynhaphang/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
            </td>
        </tr>
        <tr>
            <td>Nhà cung cấp</td>
            <td>
                <select name="nhacungcap">
                    <?php
        $sql_nhacungcap = "SELECT * FROM tbl_nhacungcap ORDER BY id DESC";
        $query_nhacungcap = mysqli_query($mysqli,$sql_nhacungcap);
        while ($row_nhacungcap = mysqli_fetch_array($query_nhacungcap)){
          if($row_nhacungcap['id']==$row['id']){
        ?>
                    <option selected value="<?php echo $row_nhacungcap['id']?>">
                        <?php echo $row_nhacungcap['tennhacungcap']?></option>
                    <?php
        }else{
        ?>
                    <option value="<?php echo $row_nhacungcap['id']?>">
                        <?php echo $row_nhacungcap['tennhacungcap']?>
                    </option>
                    <?php
          }
        }  
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <?php
          if($row['tinhtrang']==1){
        ?>
                    <option value="1" selected>Đã thanh toán</option>
                    <option value="0">Chưa thanh toán</option>
                    <?php
          }else{
        ?>
                    <option value="1">Đã thanh toán</option>
                    <option value="0" selected>Chưa thanh toán</option>
                    <?php
          }
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suanhaphang" value="Sửa nhập hàng"></td>
        </tr>
    </form>
    <?php
  }
?>
</table>