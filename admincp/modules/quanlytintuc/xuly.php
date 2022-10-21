<?php
include('../../config/config.php');

$tentintuc = $_POST['tentintuc'];
//xuly hinh anh

$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;


$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];


if(isset($_POST['themtintuc'])){
	//them
	$sql_them = "INSERT INTO tbl_tintuc(tentintuc,hinhanh,tomtat,noidung,tinhtrang) VALUE('".$tentintuc."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	header('Location:../../index.php?action=quanlytintuc&query=them');
}
elseif(isset($_POST['suatintuc'])){
	//sua
	if(!empty($_FILES['hinhanh']['name'])){

		move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		
		$sql_update = "UPDATE tbl_tintuc SET tentintuc='".$tentintuc."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."' WHERE id='$_GET[idtintuc]'";

		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_tintuc WHERE id = '$_GET[idtintuc]' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('uploads/'.$row['hinhanh']);
		}
		
	}else{
		$sql_update = "UPDATE tbl_tintuc SET tentintuc='".$tentintuc."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."' WHERE id='$_GET[idtintuc]'";
		
	}

	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlytintuc&query=them');

}else{
	$id=$_GET['idtintuc'];
	$sql = "SELECT * FROM tbl_tintuc WHERE id = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('uploads/'.$row['hinhanh']);
	}
	$sql_xoa = "DELETE FROM tbl_tintuc WHERE id='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlytintuc&query=them');
}

?>