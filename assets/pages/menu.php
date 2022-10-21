<?php
     $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
     $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
		unset($_SESSION['cart']);
        unset($_SESSION['id_khachhang']);
	} 
?>
<!-- Begin menu -->
<ul id="menu">
    <li><a href="index.php#main_list"><i class="ti-home"></i> Home</a></li>
    <?php
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
    <li><a
            href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']?>#main_list"><?php echo $row_danhmuc['tendanhmuc']?></a>
    </li>
    <?php
            }
        ?>
    <li>
        <a href="#main">
            More
            <i class="nav-arrow-down ti-angle-double-down"></i>
        </a>
        <ul class="submenu">
            <li><a href="index.php?quanly=tintuc#main_list">Tin tức</a></li>
            <li><a href="index.php?quanly=giohang#main_list">Giỏ hàng</a></li>
            <?php
                    if(isset($_SESSION['dangky'])){
                ?>
            <li><a href="index.php?dangxuat=1#main_list">Đăng xuất</a></li>
            <li><a href="index.php?quanly=doimatkhau#main_list">Đổi mật khẩu</a></li>
            <li><a href="index.php?quanly=lichsudonhang#main_list">Lịch sử đơn hàng</a></li>
            <?php
                }else{
                ?>
            <li><a href="index.php?quanly=dangky#main_list">Đăng ký</a></li>
            <li><a href="index.php?quanly=dangnhap#main_list">Đăng nhập</a></li>
            <?php
                }
                ?>
            <li><a href="index.php?quanly=lienhe#footer-section">Liên hệ</a></li>
        </ul>
    </li>
</ul>
<!-- End menu -->