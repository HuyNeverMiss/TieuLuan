<?php
	if(isset($_POST['doimatkhau'])){
		$taikhoan = $_POST['email'];
		$tenkhachhang = $_POST['tenkhachhang'];
		$old_password = md5($_POST['old_password']);
		$new_password = md5($_POST['new_password']);
		$sql = "SELECT * FROM tbl_khachhang WHERE tenkhachhang='".$tenkhachhang."' AND email='".$taikhoan."' AND matkhau='".$old_password."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		$message1 ="Mật khẩu đã được thay đổi";
		$message2 ="Tên khách hàng, tài khoản hoặc mật khẩu cũ không đúng,vui lòng nhập lại";
		if($count>0){
			$sql_update = mysqli_query($mysqli,"UPDATE tbl_khachhang SET matkhau='".$new_password."' WHERE tenkhachhang='".$tenkhachhang."'");
			echo "<script type='text/javascript'>alert('$message1');</script>";	
		}else{
			echo "<script type='text/javascript'>alert('$message2');</script>";
		}
	} 
?>
<p class="content">Đổi mật khẩu</p>
<div class="btn-btn">
    <form action="" autocomplete="off" method="POST">
        <div class="container">
            <hr>
            <label for="Tên khách hàng"><b>Tên khách hàng</b></label>
            <input type="text" placeholder="Nhập tên" name="tenkhachhang" required>
            <label for="Email"><b>Email</b></label>
            <input type="email" placeholder="Nhập email" name="email" required>
            <label for="Mật khẩu"><b>Mật khẩu cũ</b></label>
            <input type="password" placeholder="Nhập mật khẩu cũ" name="old_password" required>
            <label for="Mật khẩu"><b>Mật khẩu mới</b></label>
            <input type="password" placeholder="Nhập mật khẩu mới" name="new_password" required>
            <div class="clearfix">
                <button type="submit" name="doimatkhau" class="btn">Change</button>
            </div>
        </div>
    </form>
</div>