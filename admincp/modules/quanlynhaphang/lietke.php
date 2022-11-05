<?php
    $sql_lietke_sp = "SELECT * FROM tbl_nhaphang,tbl_nhacungcap,tbl_danhmuc WHERE tbl_nhaphang.id_ncc =tbl_nhacungcap.id AND tbl_nhaphang.id_danhmuc =tbl_danhmuc.id_danhmuc ORDER BY id_nhaphang DESC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>

<p style="font-size: 20px;margin-top:15px;"><b>Chi tiết nhập hàng</b></p>
<table style="text-align:center" class="table table-hover table-dark" style="width: 100%;" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Nhà cung cấp</th>
        <th>Danh mục</th>
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
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php echo number_format($row['gianhap'],0,',','.').'đ' ?></td>
        <td><?php echo $row['soluong1'] ?></td>
        <td><?php echo $row['soluongdaban'] ?></td>
        <td><?php echo number_format($row['gianhap']*$row['soluong1'],0,',','.').'đ'?></td>
        <td><?php if($row['tinhtrang']==1) {
        echo '<b style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: green;">Đã thanh toán</b>';
      }else{
        echo '<b style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: red;">Chưa thanh toán</b>';
      } ?></td>
        <td>
            <a href="?action=quanlynhaphang&query=sua&idnhaphang=<?php echo $row['id_nhaphang'] ?>"
                style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: #0062cc;"><i class="ti-pencil"></i></a>
            <a style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: orange;" href="modules/quanlynhaphang/innhaphang.php"><i class="ti-printer"></i></a>
            <a href="modules/quanlynhaphang/xuly.php?idnhaphang=<?php echo $row['id_nhaphang'] ?>"
                style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: red;"><i class="ti-trash"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>