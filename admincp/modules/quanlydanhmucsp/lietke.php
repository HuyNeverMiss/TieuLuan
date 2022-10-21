<?php
    $sql_lietke_danhmuc_sp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmuc_sp = mysqli_query($mysqli,$sql_lietke_danhmuc_sp);
?>
<p style="font-size: 20px;"><b>Liệt kê danh mục sản phẩm</b></p>
<table class="table table-hover table-dark" style="width: 100%;" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhmuc_sp)){
        $i++;    
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td>
            <a style="padding: 10px 15px; border-radius: 4px; background-color: green; color:aliceblue;" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"
                style="color:aliceblue"><i class="ti-trash"></i></a>
            <a style="padding: 10px 15px; border-radius: 4px; background-color: green; color:aliceblue;" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"
                style="color:aliceblue"><i class="ti-pencil"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>