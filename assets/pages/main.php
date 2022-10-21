<div id="main">
     <!-- Slides -->
    <div id="slider">
        <!-- <div class="img" style="max-width:100%">
            <img class="mySlides" src="assets/img/img1.jpg" style="width:100%">
            <img class="mySlides" src="assets/img/img2.jpg" style="width:100%">
            <img class="mySlides" src="https://th.bing.com/th/id/R.18ec8bdee372a25af6788db44ec04009?rik=XCA4OKH%2bg7MVOQ&pid=ImgRaw&r=0" style="width:100%;">
        </div> -->
        <div class="text-content">
            <h2 class="text-heading">SNEAKERSHOP</h2>
            <div class="text-discription">where you fulfill your wish</div>
        </div>
    </div>
    <div id="main_list" class="main-content">
        <?php
            if(isset($_GET['quanly'])){
                $tam = $_GET['quanly'];
            }else{
                $tam = '';
            }
            if($tam=='danhmucsanpham'){
                include("menu/danhmuc.php");
            }else if($tam=='tintuc'){
                include("menu/tintuc.php");
            }else if($tam=='baiviet'){
                include("menu/baiviet.php");
            }else if($tam=='giohang'){
                include("menu/giohang.php");
            }else if($tam=='login'){
                include("menu/login.php");
            }else if($tam=='sanpham'){
                include("menu/sanpham.php");
            }else if($tam=='dangky'){
                include("menu/dangky.php");
            }else if($tam=='dangnhap'){
                include("menu/dangnhap.php");
            }else if($tam=='timkiem'){
                include("menu/timkiem.php");
            }else if($tam=='thanhtoan'){
                include("menu/thanhtoan.php");
            }else if($tam=='vanchuyen'){
                include("menu/vanchuyen.php");
            }else if($tam=='donhangdadat'){
                include("menu/donhangdadat.php");
            }else if($tam=='thongtinthanhtoan'){
                include("menu/thongtinthanhtoan.php");
            }else if($tam=='thanks'){
                include("menu/thanks.php");
            }else if($tam=='doimatkhau'){
                include("menu/doimatkhau.php");
            }else if($tam=='lichsudonhang'){
                include("menu/lichsudonhang.php");
            }else if($tam=='xemdonhang'){
                include("menu/xemdonhang.php");
            }else if($tam=='thanks2'){
                include("menu/thanks2.php");
            }
            else{
                include("menu/index.php");
            }
            ?>
    </div>
    <div class="map-section">
        <img src="https://www.w3schools.com/w3css/map.jpg" alt="Map">
    </div>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>