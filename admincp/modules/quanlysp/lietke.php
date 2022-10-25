<?php
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc,tbl_nhacungcap WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id =tbl_nhacungcap.id
    ORDER BY id_sanpham DESC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<p style="font-size: 20px;margin-top:15px;"><b>Liệt kê sản phẩm</b></p>
<table style="text-align:center" class="table table-hover table-dark" style="width: 100%;" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>ID_NH</th>
        <th>Mã sp</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Nhà cung cấp</th>
        <th>Danh mục</th>
        <th>Giá nhập</th>
        <th>Giá bán</th>
        <th>Số lượng</th>
        <th>Giảm giá</th>
        <th>Nội dung</th>
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
        <td><?php echo $row['id_nh'] ?></td>
        <td><?php echo $row['masp'] ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
        <td><?php echo $row['tennhacungcap'] ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php echo number_format($row['gianhap'],0,',','.').'đ' ?></td>
        <td><?php echo number_format($row['giasp'],0,',','.').'đ' ?></td>
        <?php
          if($row['soluong']>0){
        ?>
        <td><?php echo $row['soluong'] ?></td>
        <?php
          }else{
        ?>
        <td>Hết hàng</td>
        <?php
          }
        ?>
        <td><?php echo $row['sale'].'%' ?></td>
        <td style="text-align:justify"><?php echo $row['noidung'] ?></td>
        <td><?php if($row['tinhtrang']==1) {
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } ?></td>
        <td> 
            <p><a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>"
                style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: green;"><i class="ti-trash"></i></a></p>
            <p><a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>"
                style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: green;"><i class="ti-pencil"></i></a></p>
        </td>
    </tr>
    <?php
    }
  ?>
</table>