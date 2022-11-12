<p style="width:98.8%; height:40px; background-color:rgb(235, 231, 231);font-size:25px;font-weight:600;line-height:40px;margin: 20px 10px;"><b>Thêm tin tức</b></p>
<table class="table hover table-dark" border="1" width="100%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlytintuc/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>Tên tin tức</td>
            <td><input type="text" name="tentintuc"></td>
        </tr>

        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea rows="10" name="tomtat" style="resize: none"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows="10" name="noidung" style="resize: none"></textarea></td>
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
            <td colspan="2"><input type="submit" name="themtintuc" value="Thêm tin tức"></td>
        </tr>
    </form>
</table>