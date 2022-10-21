<?php
    $sql_lietke_nhacungcap_sp = "SELECT * FROM tbl_nhacungcap ORDER BY thutu DESC";
    $query_lietke_nhacungcap_sp = mysqli_query($mysqli,$sql_lietke_nhacungcap_sp);
?>
<p style="font-size: 20px;"><b>Liệt kê nhà cung cấp sản phẩm</b></p>
<table class="table table-hover table-dark" style="width: 100%;" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Tên nhà cung cấp</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_nhacungcap_sp)){
        $i++;    
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tennhacungcap'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['dienthoai'] ?></td>
        <td>
            <a style="padding: 10px 15px; border-radius: 4px;  background-color: green; color:aliceblue;" href="modules/quanlynhacungcap/xuly.php?idncc=<?php echo $row['id'] ?>" style="color:aliceblue"><i class="ti-trash"></i></a>
            <a style="padding: 10px 15px; border-radius: 4px;  background-color: green; color:aliceblue;" href="?action=quanlynhacungcap&query=sua&idncc=<?php echo $row['id'] ?>" style="color:aliceblue"><i class="ti-pencil"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>