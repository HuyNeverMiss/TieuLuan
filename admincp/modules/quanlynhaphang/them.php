<p style="font-size: 20px;margin-top:15px;"><b>Nhập hàng</b></p>
<table class="table table-hover table-dark" border="1px" style="width: 100%;" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlynhaphang/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Giá nhập</td>
            <td><input type="text" name="gianhap"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong1"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Nhà cung cấp</td>
            <td>
                <select name="nhacungcap">
                    <?php
        $sql_nhacungcap = "SELECT *FROM tbl_nhacungcap ORDER BY id DESC";
        $query_nhacungcap = mysqli_query($mysqli,$sql_nhacungcap);
        while ($row_nhacungcap = mysqli_fetch_array($query_nhacungcap)){
        ?>
                    <option value="<?php echo $row_nhacungcap['id']?>"><?php echo $row_nhacungcap['tennhacungcap']?>
                    </option>
                    <?php
        }
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <option value="1">Đã thanh toán</option>
                    <option value="0">Chưa thanh toán</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themnhaphang" value="Thêm nhập hàng"></td>
        </tr>
    </form>
</table>