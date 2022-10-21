<?php
use Carbon\Carbon;
    include("admincp/config/config.php");
    require("carbon/autoload.php");
    if(isset($_GET['vnp_Amount']) && $_GET['vnp_BankCode']=='NCB'){
        $id_khachhang = $_SESSION['id_khachhang'];
        $vnp_Amount = $_GET['vnp_Amount'];
        $vnp_BankCode = $_GET['vnp_BankCode'];
        $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
        $vnp_CardType = $_GET['vnp_CardType'];
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
        $vnp_PayDate = $_GET['vnp_PayDate'];
        $vnp_TmnCode = $_GET['vnp_TmnCode'];
        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
        $code_donhang = $_GET['vnp_TxnRef'];

        //Them vao database tbl_vnpay
        $insert_vnpay = "INSERT INTO tbl_vnpay(vnp_amount, vnp_bankcode, vnp_banktranno, vnp_cardtype,	vnp_orderinfo, vnp_paydate, vnp_tmncode,vnp_transactionno, code_donhang	
        ) VALUE ('".$vnp_Amount."', '".$vnp_BankCode."', '".$vnp_BankTranNo."', '".$vnp_CardType."', '".$vnp_OrderInfo."', '".$vnp_PayDate."', '".$vnp_TmnCode."', '".$vnp_TransactionNo."', '".$code_donhang."')";
        $cart_query = mysqli_query($mysqli, $insert_vnpay);
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $donhang_thanhtoan = 'VNPay';
        $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_vanchuyen WHERE id_dangky =  $_SESSION[id_khachhang] LIMIT 1");
        $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
        $id_vanchuyen = $row_get_vanchuyen['id_vanchuyen'];
		$insert_giohang = "INSERT INTO tbl_donhang(id_khachhang,code_donhang,ngaydh,donhang_tinhtrang,donhang_thanhtoan,donhang_vanchuyen) VALUE('".$id_khachhang."','".$code_donhang."','".$now."',1,'".$donhang_thanhtoan."','".$id_vanchuyen."')";
		$giohang_query = mysqli_query($mysqli,$insert_giohang);
        if($cart_query){
			//Thêm chi tiết giỏ hàng
			foreach($_SESSION['cart'] as $key => $value){
				$id_sanpham = $value['id'];
				$soluong = $value['soluong'];
				$giamgia = $value['sale'];
				$insert_donhang = "INSERT INTO tbl_chitietdonhang(id_sanpham,code_donhang,soluong,sale) 
				VALUE('".$id_sanpham."','".$code_donhang."','".$soluong."','".$giamgia."')";
				mysqli_query($mysqli,$insert_donhang);
			}
			unset($_SESSION['cart']);
            echo '<h3 style="color: green;">Giao dịch thanh toán VNPAY thành công <i style="background-color:yellow;border-radius: 45%;" class="ti-face-smile"></i></h3>';
            echo '<p>Vui lòng vào trang <a target="_blank" href="http://localhost:8080/NienLuanNganh/index.php?quanly=lichsudonhang#main_list">Lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn</p>';
        }
    }elseif(isset($_GET['partnerCode']) && $_GET['resultCode']=='0'){
        $id_khachhang = $_SESSION['id_khachhang'];
        $code_donhang = rand(0,9999);
        $partnerCode = $_GET['partnerCode'];
        $resultCode = $_GET['resultCode'];
        $orderId = $_GET['orderId'];
        $amount = $_GET['amount'];
        $orderInfo = $_GET['orderInfo'];
        $orderType = $_GET['orderType'];
        $transId = $_GET['transId'];
        $payType= $_GET['payType'];
        $donhang_thanhtoan = 'MoMo';
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_vanchuyen WHERE id_dangky =  $_SESSION[id_khachhang] LIMIT 1");
        $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
        $id_vanchuyen = $row_get_vanchuyen['id_vanchuyen'];
		$insert_giohang = "INSERT INTO tbl_donhang(id_khachhang,code_donhang,ngaydh,donhang_tinhtrang,donhang_thanhtoan,donhang_vanchuyen) VALUE('".$id_khachhang."','".$code_donhang."','".$now."',1,'".$donhang_thanhtoan."','".$id_vanchuyen."')";
		$giohang_query = mysqli_query($mysqli,$insert_giohang);
         //Them vao database tbl_vnpay
         $insert_momo = "INSERT INTO tbl_momo(partnercode, orderid, amount, orderinfo, ordertype, transid, paytype, code_donhang) VALUE ('".$partnerCode."', '".$orderId."', '".$amount."', '".$orderInfo."', '".$orderType."', '".$transId."', '".$payType."', '".$code_donhang."')";
         $cart_query = mysqli_query($mysqli, $insert_momo);
         if($cart_query){
            //Thêm chi tiết giỏ hàng
            foreach($_SESSION['cart'] as $key => $value){
                $id_sanpham = $value['id'];
                $soluong = $value['soluong'];
                $giamgia = $value['sale'];
                $insert_donhang = "INSERT INTO tbl_chitietdonhang(id_sanpham,code_donhang,soluong,sale) 
                VALUE('".$id_sanpham."','".$code_donhang."','".$soluong."','".$giamgia."')";
                mysqli_query($mysqli,$insert_donhang);
            }
            unset($_SESSION['cart']);
            echo '<h3 style="color:green;">Giao dịch thanh toán MOMO thành công <i style="background-color:yellow;border-radius: 45%;" class="ti-face-smile"></i></h3>';
            echo '<p>Vui lòng vào trang <a target="_blank" href="http://localhost:8080/NienLuanNganh/index.php?quanly=lichsudonhang#main_list">Lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn</p>';
        }
    }else{
        unset($_SESSION['cart']);
        echo '<h3>Giao dịch thất bại!!! <i style="background-color:yellow;border-radius: 45%;" class="ti-face-sad"></i></h3>';
        echo '<p><a target="_blank" href="http://localhost:8080/NienLuanNganh/index.php?quanly=lichsudonhang#main_list">Lịch sử đơn hàng</a></p>';
    }
?>
<style>
    p.thanks {
        text-align: center;
        font-size: 20px;
        font-weight: 700;
    }
    form.ok {
        text-align: center;
    }
    form.ok > input {
        background-color: #28a745;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }
    form.ok > input:hover{
        background-color: blueviolet;
    }
</style>
<p class="thanks">
    <label>(Nếu chọn hình thức thanh toán là chuyển khoản vui lòng chuyển khoản vào tài khoản bên dưới)</label><br>
    <label>Nội dung chuyển khoản: Họ tên đã đăng ký + tên giày</label><br>
    <label>STK: 01932456789</label><br>
    <label>Họ và tên: Diệp Thanh Huy</label><br>
    <label>Ngân hàng: Aribank</label><br>
    <label>Thông tin chi tiết xin liên hệ: 0946850747 </label>
</p>
<form class="ok" action="index.php#main_list">
    <input type="submit" value="Tiếp tục mua hàng">
</form>
<div class="wrapper1">
    <div class="typing-demo">
        Cám ơn bạn đã mua hàng ,chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất
    </div>
</div>