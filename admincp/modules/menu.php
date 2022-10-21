<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header('Location:login.php');
	}
?>
<div id="header_admincp">
    <ul id="menu_admincp">
        <li><a href="index.php#chart"><b>Thống kê</b></a></li>
        <li><a href="index.php?action=quanlydanhmucsanpham&query=them"><b>Danh mục sản phẩm</b></a></li>
        <li><a href="index.php?action=quanlynhacungcap&query=them"><b>Nhà cung cấp</b></a></li>
        <li><a href="index.php?action=quanlynhaphang&query=them"><b>Nhập hàng</b></a></li>
        <li><a href="index.php?action=quanlysp&query=them"><b>Sản phẩm</b></a></li>
        <li><a href="index.php?action=quanlydonhang&query=lietke"><b>Đơn hàng</b></a></li>
        <li><a href="index.php?action=quanlytintuc&query=them"><b>Tin tức</b></a></li>
        <li>
            <p><a href="index.php?dangxuat=1"><b>Đăng xuất: </b><?php if(isset($_SESSION['dangnhap'])){
				echo $_SESSION['dangnhap'];
		} 
		?></a></p>
        </li>
    </ul>
</div>