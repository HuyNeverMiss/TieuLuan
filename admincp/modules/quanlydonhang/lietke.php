<p class="content1">Liệt kê đơn hàng</p>
<?php
	$sql_lietke_dh = "SELECT * FROM tbl_donhang,tbl_khachhang WHERE tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang 
  ORDER BY tbl_donhang.id_donhang DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table class="table hover table-dark" style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt hàng</th>
        <th>Hình thức thanh toán</th>
        <th>Tình trạng</th>
        <th>Xem đơn hàng</th>
        <th>In đơn hàng</th>
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
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['dienthoai'] ?></td>
        <td><?php echo $row['ngaydh'] ?></td>
        <td><p style="text-align:center ;padding: 10px 15px; border-radius: 4px; background-color: blue; color:aliceblue;"><?php echo $row['donhang_thanhtoan'] ?></p></td>
        <td>
            <?php if($row['donhang_tinhtrang']==1){
    		echo '<a style="
          padding: 10px 15px;
          border-radius: 4px;
          background-color: white; " href="modules/quanlydonhang/xuly.php?code='.$row['code_donhang'].'">Đơn hàng mới</a>';
    	}else{
    		echo '<label style="
        padding: 10px 15px;
        border-radius: 4px;
        background-color: green;
    ">Đã xử lý</label>';
    	}
    	?>
        </td>
        <td>
            <a style="padding: 10px 15px; border-radius: 4px; background-color: orange; color:aliceblue;" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_donhang'] ?>"><i class="ti-bookmark"></i></a>
        </td>
        <td>
            <a style="padding: 10px 15px; border-radius: 4px; background-color: orange; color:aliceblue;" href="modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_donhang'] ?>"><i class="ti-printer"></i></a>
        </td>
    </tr>
    <?php
  } 
  ?>

</table>