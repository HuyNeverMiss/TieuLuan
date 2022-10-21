<p class="content">SNEAKERSHOP
    <?php
  if(isset($_SESSION['dangky'])){
    echo 'xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span>'; 
  } 
  ?>
</p>
<?php
	if(isset($_SESSION['cart'])){
		
	}
?>
<?php
  if(isset($_SESSION['id_khachhang'])){
?>
<div class="container1">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step current"> <span> <a href="index.php?quanly=giohang#main_list">Giỏ hàng</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=vanchuyen#main_list">Vận chuyển</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan#main_list">Thông tin thanh toán</a><span>
        </div>
    </div>
</div>
<?php
  }
?>

<table class="table table-hover table-dark" style="width:100%;text-align: center;border-collapse: collapse;" border="5">
    <tr>
        <th>Id</th>
        <th>Mã sp</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Giảm giá</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
    </tr>
    <?php
  if(isset($_SESSION['cart'])){
  	$i = 0;
  	$tongtien = 0;
  	foreach($_SESSION['cart'] as $cart_item){
  		$thanhtien = $cart_item['soluong']*($cart_item['giasp']-$cart_item['giasp']*$cart_item['sale']/100);
  		$tongtien+=$thanhtien;
  		$i++;
  ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cart_item['masp']; ?></td>
        <td><?php echo $cart_item['tensanpham']; ?></td>
        <td><img style="border-radius: 30%;" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
        <td> 
            <a href="assets/pages/menu/themgiohang.php?cong=<?php echo $cart_item['id'] ?>#main_list"><i
                    class="fa fa-plus fa-style" aria-hidden="true"></i></a>
            <?php echo $cart_item['soluong']; ?>
            <a href="assets/pages/menu/themgiohang.php?tru=<?php echo $cart_item['id'] ?>#main_list"><i
                    class="fa fa-minus fa-style" aria-hidden="true"></i></a>
        </td>
        <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
        <td><?php echo number_format($cart_item['sale']).'%' ?></td>
        <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
        <td><a href="assets/pages/menu/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>#main_list"><i class="ti-close"></i></a></td>
    </tr>
    <?php
  	}
  ?>
    <tr>
        <td colspan="8">
            <p style="float: left;"><b>Tổng tiền: </b><?php echo number_format($tongtien,0,',','.').'vnđ' ?></p><br />
            <p style="float: right;"><a href="assets/pages/menu/themgiohang.php?xoatatca=1#main_list"><b><i class="ti-trash"></i></b></a></p>
            <div style="clear: both;"></div>
            <?php
        if(isset($_SESSION['dangky'])){
          ?>
            <p><a href="index.php?quanly=vanchuyen#main_list"><b><i class="ti-truck"></i> Hình thức vận chuyển</b></a></p>
            <?php
        }else{
      ?>
            <p><a href="index.php?quanly=dangky#main_list"><b>Đăng ký đặt hàng</b></a></p>
            <?php
        }
      ?>
        </td>
    </tr>
    <?php	
  }else{ 
  ?>
    <tr>
        <td colspan="8">
            <p><b>Hiện tại giỏ hàng trống</b></p>
        </td>

    </tr>
    <?php
  } 
  ?>

</table>