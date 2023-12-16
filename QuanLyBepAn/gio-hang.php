<?php
  include("cls/clsgiohang.php");
  $p = new giohang();
?>
<?php
session_start();
if (isset($_POST['nut']) && $_POST['nut'] == 'Đặt suất') {
    // Check if the form is submitted

    // Retrieve the total amount from the POST data
    $tt = $_POST['tongtien'];

    // Initialize the session if not already done
    

    // Store the total amount in the session
    $_SESSION['tongtien'][] = $tt;

    // Redirect or perform other actions as needed
    // header("Location: your_target_page.php");
    // exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="css/giohang.css">
    <style>
        .gio-hang-trong{ width: 100%;}
    </style>
<?php include("header.php"); ?>
    <!--===================MAIN=====================-->
    <div class="container-fluid">
        <div class="row">
            <?php 
                $sql = 'select monan.TenMon,
                            giohang.SoLuong,
                            monan.Gia,
                            giohang.Ngaydat,
                            monan.Gia * giohang.SoLuong AS ThanhTien,
                            giohang.id
                        from giohang
                        join monan on giohang.MaMon = monan.MaMon
                        where giohang.Username = "'.$_SESSION['user'].'" ';
                $p->xuatgiohang($sql); 
				var_dump($_SESSION['tongtien']);
				echo $_POST['tongtien'];
            ?>
        </div>
        <?php
            if (isset($_REQUEST['id'])) $id = $_REQUEST['id'];
            switch($_REQUEST['nut']){
                case 'Xóa':{
                    $sql = "delete from giohang where id = '$id'";
                    if($p->xoasuagiohang($sql)==1){
                        echo '<script language="javascript">alert("Xóa thành công");</script>';
                        echo '<script language="javascript">window.location="../QuanLyBepAn/gio-hang.php";</script>';
                    }
                    else{
                        echo '<script language="javascript">alert("Xóa không thành công");</script>';
                        echo '<script language="javascript">window.location="../QuanLyBepAn/gio-hang.php";</script>';
                    }
                    break;
                }
                case 'Sửa':{
                    if (isset($_REQUEST['soluong'])) $soluong = $_REQUEST['soluong'];
                    $user=$_SESSION['user'];
                    $sql = "update giohang set SoLuong='$soluong' where id='$id' and Username='$user'";
                    if($p->xoasuagiohang($sql)==1){
                        echo '<script language="javascript">alert("Sửa thành công");</script>';
                        echo '<script language="javascript">window.location="../QuanLyBepAn/gio-hang.php";</script>';
                    }
                    else{
                        echo '<script language="javascript">alert("Không thành công");</script>';
                        echo '<script language="javascript">window.location="../QuanLyBepAn/gio-hang.php";</script>';
                    }
                    break;
                }
            }
        ?>
    </div>

<?php include("footer.php"); ?>