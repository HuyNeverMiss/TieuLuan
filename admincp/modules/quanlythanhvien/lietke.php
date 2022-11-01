<?php
    $sql_lietke_thanhvien = "SELECT * FROM tbl_khachhang ORDER BY tbl_khachhang.id_khachhang DESC";
    $query_lietke_thanhvien = mysqli_query($mysqli,$sql_lietke_thanhvien);
?>
<p style="font-size: 20px;margin-top:15px;"><b>Liệt kê thành viên</b></p>
<table style="text-align:center" class="table table-hover table-dark" style="width: 100%;" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Tên thành viên</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Mật khẩu</th>
        <th>Điện thoại</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_thanhvien)){
        $i++;    
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tenkhachhang'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['matkhau'] ?></td>
        <td><?php echo $row['dienthoai'] ?></td>
        <td>
            <a style="padding: 10px 15px; border-radius: 4px;  background-color: green; color:aliceblue;" href="modules/quanlythanhvien/xuly.php?idkhachhang=<?php echo $row['id_khachhang'] ?>" style="color:aliceblue"><i class="ti-trash"></i></a>
            <a style="padding: 10px 15px; border-radius: 4px;  background-color: green; color:aliceblue;" href="?action=quanlythanhvien&query=sua&idkhachhang=<?php echo $row['id_khachhang'] ?>" style="color:aliceblue"><i class="ti-pencil"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>