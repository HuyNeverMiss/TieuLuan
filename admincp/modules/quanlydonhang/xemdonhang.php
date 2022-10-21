<p class="content">Xem đơn hàng</p>
<?php
	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham WHERE tbl_chitietdonhang.id_sanpham=tbl_sanpham.id_sanpham 
    AND tbl_chitietdonhang.code_donhang='".$code."' ORDER BY tbl_chitietdonhang.id_chitietdonhang DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table class="table hover table-dark" style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Giảm giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
  $i = 0;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  	$thanhtien = ($row['giasp']-$row['giasp']*$row['sale']/100)*$row['SoLuong'];
  	$tongtien += $thanhtien ;
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['code_donhang'] ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><?php echo $row['SoLuong'] ?></td>
        <td><?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></td>
        <td><?php echo number_format($row['sale']).'%'?></td>
        <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
    </tr>
    <?php
  } 
  ?>
    <tr>
        <td colspan="6">
            <p>Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
        </td>
    </tr>
</table>