<?php
    session_start();
    include('cls/clsdangnhap.php');
    $p = new login();
    if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])){
        $p -> confirmlogin($_SESSION['id'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['phanquyen']);
    }
    else{
        header('location:../QuanLyBepAn/dang-nhap.php');
    }
?>
<?php
  include("cls/clsquanly.php");
  $p = new quanly();
?>
<?php
    if(isset($_REQUEST['manvl'])) $mamon = $_REQUEST['manvl'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang Quản Lý</title>
    <title>Document</title>
    <link rel="stylesheet" href="css/quanly.css">
<?php include("header.php"); ?>
    <!--===================MAIN=====================-->
    <div class="container-fluid">
        <div class="row">
            <div class="chucnang col-xl-2 col-lg-2 col-md-3 col-sm-3">
                <h4><strong>CHỨC NĂNG</strong></h4>
				<?php $p->xuatchucnang(); ?>
            </div>
    
            <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9">
                
                        <?php
                            $sql="SELECT 
									nvl.MaNVL,
									nvl.TenNVL,
									monan_nvl.KhoiLuong,
									SUM(giohang.SoLuong) AS TongSoLuong,
									COALESCE(SUM(monan_nvl.KhoiLuong * giohang.SoLuong), 0) AS TongKhoiLuong,
									nvl.DonGia,
									nvl.DonVi
								FROM 
									nvl
								LEFT JOIN 
									monan_nvl ON nvl.MaNVL = monan_nvl.MaNVL
								LEFT JOIN 
									giohang ON monan_nvl.MaMon = giohang.MaMon
								GROUP BY 
									nvl.MaNVL, nvl.TenNVL, monan_nvl.KhoiLuong, nvl.DonGia, nvl.DonVi
								HAVING 
									TongKhoiLuong > 0
								ORDER BY 
									nvl.MaNVL";
                            
                        ?>
                
                <hr color="#F9F2F2">
              <center><h5><strong>---------------TÍNH NGUYÊN LIỆU---------------</strong></h5></center>
                <?php $p->tinhtoannvl($sql); ?>  
          
            </div>
        </div>
    </div>


<?php include("footer.php"); ?>

