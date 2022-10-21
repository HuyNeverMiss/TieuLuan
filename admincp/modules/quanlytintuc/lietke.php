<?php
	$sql_lietke_bv = "SELECT * FROM tbl_tintuc ORDER BY tbl_tintuc.id DESC";
	$query_lietke_bv = mysqli_query($mysqli,$sql_lietke_bv);
?>
<p><b>Liệt kê danh mục bài viết</b></p>
<table class="table hover table-dark" style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Tên tin tức</th>
        <th>Hình ảnh</th>
        <th>Tóm tắt</th>
        <th>Nội dung</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
    </tr>
    <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_bv)){
  	$i++;
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tentintuc'] ?></td>
        <td><img src="modules/quanlytintuc/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php echo $row['noidung'] ?></td>
        <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
        </td>
        <td>
            <p><a style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: green;" href="modules/quanlytintuc/xuly.php?idtintuc=<?php echo $row['id'] ?>"><i class="ti-trash"></i></a></p>
            <p><a style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: green;" href="?action=quanlytintuc&query=sua&idtintuc=<?php echo $row['id'] ?>"><i class="ti-pencil"></i></a></p>
        </td>

    </tr>
    <?php
  } 
  ?>

</table>