<div id="slider_admincp">
    <div class="text-content">
        <h2 class="text-heading">SNEAKERSHOP</h2>
        <div class="text-discription">where you fulfill your wish</div>
    </div>
</div>
<p class="content">Thống kê</p>
<p><b style="font-size: 20px;">Thống kê đơn hàng theo : </b><span style="font-weight: 700;" id="text-date"></span></p>
<p>
    <select class="select-date">
        <option value="7ngay">7 ngày qua</option>
        <option value="28ngay">28 ngày qua</option>
        <option value="90ngay">90 ngày qua</option>
        <option value="365ngay">365 ngày qua</option>
    </select>
</p>
<?php
     $sql_khachhang = "SELECT * FROM tbl_khachhang";
     $query_khachhang = mysqli_query($mysqli,$sql_khachhang);
     $count = mysqli_num_rows($query_khachhang);
     $sql_donhang = "SELECT * FROM tbl_donhang WHERE donhang_tinhtrang=0";
     $query_donhang = mysqli_query($mysqli,$sql_donhang);
     $count1 = mysqli_num_rows($query_donhang);
     $sql_donhang1 = "SELECT * FROM tbl_donhang";
     $query_donhang1 = mysqli_query($mysqli,$sql_donhang1);
     $count2 = mysqli_num_rows($query_donhang1);
?>
<div class="thongke" style="margin-top:60px; margin-bottom:60px;">
    <i style="font-size: 80px;font-weight:500;margin: 80px 80px;" class="ti-bag"><a href="index.php?action=quanlydonhang&query=lietke" style="font-size:20px;background-color: lightgreen;border-radius: 80%; padding: 15px;"><?php echo $count2?> Đơn hàng</a></i>
    <i style="font-size: 80px;font-weight:500; margin: 80px 80px;" class="ti-truck"><a style="font-size:20px;background-color: lightgreen; margin-left: 5px; border-radius: 80%; padding: 15px;"><?php echo $count1?> Đã giao</a></i>
    <i style="font-size: 80px;font-weight:500; margin: 80px 80px;" class="ti-user"><a style="font-size:20px;background-color: lightgreen; margin-left: 5px; border-radius: 80%; padding: 15px;"><?php echo $count?> Thành viên</a></i>
</div>
<div id="chart" style="height: 250px;background-color: white"></div>
