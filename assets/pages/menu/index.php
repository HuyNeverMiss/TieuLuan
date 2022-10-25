<!-- SẢN PHẨM NỔI BẬT -->
<?php
	if(isset($_GET['trang'])){
		$page = $_GET['trang'];
	}else{
		$page = 1;
	}
	if($page == '' || $page == 1){
		$begin = 0;
	}else{
		$begin = ($page-1)* 10;
	}
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham ASC LIMIT $begin,10";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	
?>
<p class="content">SẢN PHẨM NỔI BẬT</p>
<ul class="product_list">
    <?php
				while($row = mysqli_fetch_array($query_pro)){ 
			?>
    <li style="border-radius: 10%;">
        <?php
        if($row['sale']=='0'){
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'đ'?></p>
            <p class="price_product" style="color: #d1d1d1;">###</p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
        </a>
        <?php
        }else{
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp']-($row['giasp']*$row['sale']/100),0,',','.').'đ' ?></p>
            <p style="text-decoration-line:line-through;color:#d1d1d1" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'đ'?></p>
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
<div style="clear:both;"></div>
<style type="text/css">
ul.list_trang {
    padding: 0;
    margin: 0;
    list-style: none;
}

ul.list_trang li {
    float: left;
    padding: 5px 13px;
    margin: 5px;
    background: burlywood;
    display: block;
    border-radius: 50%
}

ul.list_trang li:hover {
    background-color: gray;
}

ul.list_trang li a {
    color: #000;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
}
</style>
<?php
$sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
$row_count = mysqli_num_rows($sql_trang);  
$trang = ceil($row_count/10);
?>
<p style="font-weight: 600;">Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>

<ul class="list_trang">

    <?php
					
	for($i=1;$i<=$trang;$i++){ 
	?>
    <li <?php if($i==$page){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a
            href="index.php?trang=<?php echo $i ?>#main_list"><?php echo $i ?></a></li>
    <?php
	} 
	?>

</ul>

<!-- SẢN PHẨM GIẢM GIÁ -->
<?php
	if(isset($_GET['trang1'])){
		$page1 = $_GET['trang1'];
	}else{
		$page1 = 1;
	}
	if($page1 == '' || $page1 == 1){
		$begin1 = 0;
	}else{
		$begin1 = ($page1-1)* 5;
	}
	$sql_pro1 = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.sale > 0 ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin1,5";
	$query_pro1 = mysqli_query($mysqli,$sql_pro1);
	
?>
<div style="margin-top: 100px;" class="sale" id="sale">
<p class="content1">SẢN PHẨM GIẢM GIÁ</p>
<ul class="product_list">
    <?php
				while($row = mysqli_fetch_array($query_pro1)){ 
			?>
    <li style="border-radius: 10%;">
        <?php
        if($row['sale']=='0'){
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
            <p class="price_product">###</p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
        </a>
        <?php
        }else{
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp']-($row['giasp']*$row['sale']/100),0,',','.').'vnđ' ?></p>
            <p style="text-decoration-line:line-through;color:#d1d1d1" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
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
<div style="clear:both;"></div>
<style type="text/css">
ul.list_trang1 {
    padding: 0;
    margin: 0;
    list-style: none;
}

ul.list_trang1 li {
    float: left;
    padding: 5px 13px;
    margin: 5px;
    background: burlywood;
    display: block;
    border-radius: 50%
}

ul.list_trang1 li:hover {
    background-color: gray;
}

ul.list_trang1 li a {
    color: #000;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
}
</style>
<?php
$sql_trang1 = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE tbl_sanpham.sale > 0");
$row_count1 = mysqli_num_rows($sql_trang1);  
$trang1 = ceil($row_count1/5);
?>
<p style="font-weight: 600;">Trang hiện tại : <?php echo $page1 ?>/<?php echo $trang1 ?> </p>

<ul class="list_trang1">

    <?php
					
	for($i=1;$i<=$trang1;$i++){ 
	?>
    <li <?php if($i==$page1){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a
            href="index.php?trang1=<?php echo $i ?>#sale"><?php echo $i ?></a></li>
    <?php
	} 
	?>
</ul>
</div>