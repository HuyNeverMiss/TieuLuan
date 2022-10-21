<?php
    include("../../config/config.php");
    $tensanpham = $_POST['tensanpham'];
    $gianhap = $_POST['gianhap'];
    $soluong1 = $_POST['soluong1'];
    //xuly hinh anh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $tinhtrang = $_POST['tinhtrang'];
    $nhacungcap = $_POST['nhacungcap'];
    if(isset($_POST['themnhaphang'])){
        //them
        $sql_them = "INSERT INTO tbl_nhaphang(tensanpham,gianhap,soluong1,hinhanh,tinhtrang,id) 
        VALUE('".$tensanpham."','".$gianhap."','".$soluong1."','".$hinhanh."','".$tinhtrang."','".$nhacungcap."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlynhaphang&query=them');
    }elseif(isset($_POST['suanhaphang'])){
        //sua
        if(!empty($_FILES['hinhanh']['name'])){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql_update = "UPDATE tbl_nhaphang SET tensanpham='".$tensanpham."', gianhap='".$gianhap."', soluong1='".$soluong1."', 
            hinhanh='".$hinhanh."',tinhtrang='".$tinhtrang."',id ='".$nhacungcap."' WHERE id_nhaphang='$_GET[idnhaphang]'";
            //xoa hinh cũ
            $sql = "SELECT * FROM tbl_nhaphang WHERE id_nhaphang = '$_GET[idnhaphang]' LIMIT 1";
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        }else{
            $sql_update = "UPDATE tbl_nhaphang SET tensanpham='".$tensanpham."', gianhap='".$gianhap."', soluong1='".$soluong1."', tinhtrang='".$tinhtrang."',id ='".$nhacungcap."' WHERE id_nhaphang='$_GET[idnhaphang]'";
        }
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlynhaphang&query=them');
    }else{
        $id = $_GET['idnhaphang'];
        $sql = "SELECT * FROM tbl_nhaphang WHERE id_nhaphang = '$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_nhaphang WHERE id_nhaphang='".$id."'";    
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlynhaphang&query=them');
    }

?>