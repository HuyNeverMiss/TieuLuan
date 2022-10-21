<p class="content">Lịch sử đơn hàng</p>
<?php
  $id_khachhang = $_SESSION['id_khachhang'];
	$sql_lietke_dh = "SELECT * FROM tbl_donhang,tbl_khachhang WHERE tbl_donhang.id_khachhang='$id_khachhang' AND tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang 
  ORDER BY tbl_donhang.id_donhang DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table class="table hover table-dark" style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt hàng</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
        <th>Hình thức thanh toán</th>
    </tr>
    <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['code_donhang'] ?></td>
        <td><?php echo $row['tenkhachhang'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['ngaydh'] ?></td>
        <td>
            <?php if($row['donhang_tinhtrang']==1){
    		echo 'Đơn hàng mới';
    	}else{
    		echo 'Đã xử lý';
    	}
    	?>
        </td>
        <td>
            <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_donhang'] ?>#main_list">Xem đơn hàng</a>
        </td>
        <td><?php echo $row['donhang_thanhtoan'] ?></td>
    </tr>
    <?php
  } 
  ?>

</table>