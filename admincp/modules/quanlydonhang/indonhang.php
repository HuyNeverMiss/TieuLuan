<?php
    require('../../../tfpdf/tfpdf.php');
    include('../../config/config.php');
    
    $pdf = new tFPDF();
    $pdf->AddPage("0");
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);

    $pdf->SetFillColor(193,229,252);
    //Set header
    
    $code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham WHERE tbl_chitietdonhang.id_sanpham=tbl_sanpham.id_sanpham 
    AND tbl_chitietdonhang.code_donhang='".$code."' ORDER BY tbl_chitietdonhang.id_chitietdonhang DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
    
    $pdf->Write(10,'Đơn hàng của bạn gồm có:');
	$pdf->Ln(10);

	$width_cell=array(6,35,80,20,30,48,40);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã đơn hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Giảm giá',1,0,'C',true);
	$pdf->Cell($width_cell[6],10,'Tổng tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
	while($row = mysqli_fetch_array($query_lietke_dh)){
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['code_donhang'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['tensanpham'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['SoLuong'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['giasp']),1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,number_format($row['sale']).'%',1,0,'C',$fill);
	$pdf->Cell($width_cell[6],10,number_format($row['SoLuong']*($row['giasp']-($row['giasp']*$row['sale']/100))),1,1,'C',$fill);
	}
	$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');
	$pdf->Ln(10);
    
    $pdf->Output();
?>