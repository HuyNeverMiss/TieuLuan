<p class="content">CHI TIẾT SẢN PHẨM</p>
<?php
	$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
	$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
	while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
    <div class="hinhanh_sanpham">
        <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
    </div>
    <form method="POST"
        action="assets/pages/menu/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>#main_list">
        <div class="chitiet_sanpham">
            <h3 style="margin-bottom: 10px"><?php echo $row_chitiet['tensanpham'] ?></h3>
            <p style="font-weight: 600;">Mã sản phẩm: <?php echo $row_chitiet['masp'] ?></p>
            <p style="font-weight: 600;">Giá sản phẩm: <?php echo number_format($row_chitiet['giasp'],0,',','.').'vnđ' ?></p>
            <!-- <p style="font-weight: 600;">Giảm giá: <?php echo number_format($row_chitiet['sale']).'%' ?></p> -->
            <p style="font-weight: 600;">Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc'] ?></p>
            <?php
                if($row_chitiet['soluong']==0){
            ?>
            <p style="color: red;font-weight:700;">Hết hàng</p>
            <?php
                }else{
            ?>
            <p style="font-weight: 600;">Số lượng tồn: <?php echo $row_chitiet['soluong'] ?> sản phẩm</p>
            <?php
                }
            ?>
            <?php
            if($row_chitiet['tinhtrang']==1 && $row_chitiet['soluong']>0){
            ?>
            <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
            <?php
            }else{
            ?>
            <p><input disabled class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng">(Không khả dụng)</p>
            <?php
            }
            ?>
        </div>
    </form>
    <div class="clear"></div>
    <div class="tabs">
        <ul id="tabs-nav">
            <li><a href="#tab1">Thông số kỹ thuật</a></li>
            <li><a href="#tab2">Nội dung chi tiết</a></li>
            <li><a href="#tab3">Hình ảnh sản phẩm</a></li>

        </ul> <!-- END tabs-nav -->
        <div id="tabs-content">
            <div id="tab1" class="tab-content" style="font-weight: 600;">
                <?php echo $row_chitiet['tomtat'] ?>
            </div>
            <div id="tab2" class="tab-content" style="font-weight: 600;">
                <?php echo $row_chitiet['noidung'] ?>
            </div>
            <div id="tab3" class="tab-content" style="font-weight: 600;">
                <img width="30%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
            </div>

        </div> <!-- END tabs-content -->
    </div> <!-- END tabs -->
</div>
<?php
} 
?>

<!-- SẢN PHẨM LIÊN QUAN -->
<?php
    $sql_chitiet1 = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet1 = mysqli_query($mysqli,$sql_chitiet1);
    $row_chitiet1 = mysqli_fetch_array($query_chitiet1);
    $id_danhmuc = $row_chitiet1['id_danhmuc'];
    $id = $_GET['id'];
	$sql_pro1 = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham!=$id AND tbl_sanpham.id_danhmuc=$id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC";
	$query_pro1 = mysqli_query($mysqli,$sql_pro1);
?>
<div style="margin-top: 100px;">
<p class="content1">SẢN PHẨM LIÊN QUAN</p>
<ul class="product_list">
    <?php
				while($row = mysqli_fetch_array($query_pro1)){ 
			?>
    <li>
        <?php
        if($row['sale']=='0'){
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: white;font-size: 14px;font-weight: bold;padding: 0px 61px;border-radius: 15px;background-color: red;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
            <p class="price_product">###</p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
        </a>
        <?php
        }else{
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: white;font-size: 14px;font-weight: bold;padding: 0px 61px;border-radius: 15px;background-color: red;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp']-($row['giasp']*$row['sale']/100),0,',','.').'vnđ' ?></p>
            <p style="text-decoration-line:line-through" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
        </a>
        <?php
        }
        ?>
    </li>
    <?php
            }  
			?>
</ul>