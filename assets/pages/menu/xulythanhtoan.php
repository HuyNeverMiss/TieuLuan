<?php

use Carbon\Carbon;

session_start();
	include('../../../admincp/config/config.php');
	require("../../../carbon/autoload.php");
	require_once("config_vnpay.php");
	$id_khachhang = $_SESSION['id_khachhang'];
	$code_donhang = rand(0,9999);
	$donhang_thanhtoan = $_POST['thanhtoan'];
    
    //lay id thong tin van chuyen
    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_vanchuyen WHERE id_dangky =  $_SESSION[id_khachhang] LIMIT 1");
    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
    $id_vanchuyen = $row_get_vanchuyen['id_vanchuyen'];
	$tongtien = 0;
	foreach($_SESSION['cart'] as $key => $value){
		$thanhtien = $value['soluong']*($value['giasp']-$value['giasp']*$value['sale']/100);
  		$tongtien+=$thanhtien;
	}
	if($donhang_thanhtoan == 'Cash' || $donhang_thanhtoan == 'Banking'){
		//Them vao gio hang
		$now = Carbon::now('Asia/Ho_Chi_Minh');
		$insert_giohang = "INSERT INTO tbl_donhang(id_khachhang,code_donhang,ngaydh,donhang_tinhtrang,donhang_thanhtoan,donhang_vanchuyen) VALUE('".$id_khachhang."','".$code_donhang."','".$now."',1,'".$donhang_thanhtoan."','".$id_vanchuyen."')";
		$giohang_query = mysqli_query($mysqli,$insert_giohang);
		if($giohang_query){
			//Thêm chi tiết giỏ hàng
			foreach($_SESSION['cart'] as $key => $value){
				$id_sanpham = $value['id'];
				$soluong = $value['soluong'];
				$giamgia = $value['sale'];
				$insert_donhang = "INSERT INTO tbl_chitietdonhang(id_sanpham,code_donhang,soluong,sale) 
				VALUE('".$id_sanpham."','".$code_donhang."','".$soluong."','".$giamgia."')";
				mysqli_query($mysqli,$insert_donhang);
			}
		}
		unset($_SESSION['cart']);
		header('Location:../../../index.php?quanly=thanks2#main_list');
	}elseif($donhang_thanhtoan == 'MoMo' ){
		//Thanh toan bang momo
		echo 'Thanh toan bang momo';
	}elseif($donhang_thanhtoan == 'VNPay' ){
		//Thanh toan bang vnpay
		$vnp_TxnRef = $code_donhang; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
		$vnp_OrderInfo = 'Thanh toán hóa đơn';
		$vnp_OrderType = 'vnpay';
		$vnp_Amount = $tongtien * 100;
		$vnp_Locale = 'vn';
		$vnp_BankCode = 'NCB';
		$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
		//Add Params of 2.0.1 Version
		$vnp_ExpireDate = $expire;
	
		$inputData = array(
			"vnp_Version" => "2.1.0",
			"vnp_TmnCode" => $vnp_TmnCode,
			"vnp_Amount" => $vnp_Amount,
			"vnp_Command" => "pay",
			"vnp_CreateDate" => date('YmdHis'),
			"vnp_CurrCode" => "VND",
			"vnp_IpAddr" => $vnp_IpAddr,
			"vnp_Locale" => $vnp_Locale,
			"vnp_OrderInfo" => $vnp_OrderInfo,
			"vnp_OrderType" => $vnp_OrderType,
			"vnp_ReturnUrl" => $vnp_Returnurl,
			"vnp_TxnRef" => $vnp_TxnRef,
			"vnp_ExpireDate"=>$vnp_ExpireDate
		);

		if (isset($vnp_BankCode) && $vnp_BankCode != "") {
			$inputData['vnp_BankCode'] = $vnp_BankCode;
		}

		//var_dump($inputData);
		ksort($inputData);
		$query = "";
		$i = 0;
		$hashdata = "";
		foreach ($inputData as $key => $value) {
			if ($i == 1) {
				$hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
			} else {
				$hashdata .= urlencode($key) . "=" . urlencode($value);
				$i = 1;
			}
			$query .= urlencode($key) . "=" . urlencode($value) . '&';
		}

		$vnp_Url = $vnp_Url . "?" . $query;
		if (isset($vnp_HashSecret)) {
			$vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
			$vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
		}
		$returnData = array('code' => '00'
			, 'message' => 'success'
			, 'data' => $vnp_Url);
			if (isset($_POST['redirect'])) {
				header('Location: ' . $vnp_Url);
				die();
			} else {
				echo json_encode($returnData);
			}
			// vui lòng tham khảo thêm tại code demo
	}
?>