<p style="font-size: 20px;margin-top:15px;"><b>Thêm sản phẩm</b></p>
<table class="table table-hover table-dark" border="1px" style="width: 100%;" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Mã sp</td>
            <td><input type="text" name="masp"></td>
        </tr>
        <tr>
            <td>Giá nhập</td>
            <td><input type="text" name="gianhap"></td>
        </tr>
        <tr>
            <td>Giá bán</td>
            <td><input type="text" name="giasp"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong"></td>
        </tr>
        <tr>
            <td>Giảm giá</td>
            <td><input type="text" name="sale"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh" multiple></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea rows="10" name="tomtat" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows="10" name="noidung" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc">
                    <?php
        $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
                    <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?>
                    </option>
                    <?php
        }
        ?>
                </select>
            </td>
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
            <td>Hàng trong kho</td>
            <td>
                <select name="tenhang">
                    <?php
        $sql_tenhang = "SELECT *FROM tbl_nhaphang ORDER BY id_nhaphang DESC";
        $query_tenhang = mysqli_query($mysqli,$sql_tenhang);
        while ($row_tenhang = mysqli_fetch_array($query_tenhang)){
        ?>
                    <option value="<?php echo $row_tenhang['id_nhaphang']?>"><?php echo $row_tenhang['tensanpham']?>
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
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </form>
</table>