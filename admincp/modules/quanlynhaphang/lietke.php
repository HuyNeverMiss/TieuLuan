<?php
    $sql_lietke_sp = "SELECT * FROM tbl_nhaphang,tbl_nhacungcap WHERE tbl_nhaphang.id =tbl_nhacungcap.id
    ORDER BY id_nhaphang DESC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>

<p style="font-size: 20px;"><b>Chi tiết nhập hàng</b></p>
<table class="table table-hover table-dark" style="width: 100%;" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Nhà cung cấp</th>
        <th>Giá nhập</th>
        <th>Số lượng</th>
        <th>Số lượng đã bán</th>
        <th>Tổng giá nhập</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_sp)){
        $i++;    
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><img src="modules/quanlynhaphang/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
        <td><?php echo $row['tennhacungcap'] ?></td>
        <td><?php echo number_format($row['gianhap'],0,',','.').'vnđ' ?></td>
        <td><?php echo $row['soluong1'] ?></td>
        <td><?php echo $row['soluongdaban'] ?></td>
        <td><?php echo number_format($row['gianhap']*$row['soluong1'],0,',','.').'vnđ'?></td>
        <td><?php if($row['tinhtrang']==1) {
        echo 'Đã thanh toán';
      }else{
        echo 'Chưa thanh toán';
      } ?></td>
        <td>
            <a href="modules/quanlynhaphang/xuly.php?idnhaphang=<?php echo $row['id_nhaphang'] ?>"
                style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: green;"><i class="ti-trash"></i></a>
            <a href="?action=quanlynhaphang&query=sua&idnhaphang=<?php echo $row['id_nhaphang'] ?>"
                style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: green;"><i class="ti-pencil"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>