<?php
session_start();
include('cls/clsdangnhap.php');
$p = new login();
if (isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])) {
	$p->confirmlogin($_SESSION['id'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['phanquyen']);
} else {
	header('location:../QuanLyBepAn/dang-nhap.php');
}
?>
<?php
include("cls/clsquanly.php");
$q = new quanly();
?>
<?php
include("cls/clsthucdon-user.php");
$p = new qlba();
?>
<?php
if (isset($_REQUEST['laymaThucDon'])) {
	$laymaThucDon = $_REQUEST['laymaThucDon'];
}
if (isset($_REQUEST['mamon'])) {
	$mamon = $_REQUEST['mamon'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Thực đơn</title>
	<title>Document</title>
	<link rel="stylesheet" href="css/quanly.css">
	<link rel="stylesheet" href="css/dsthucdon.css">
	<?php include("header.php"); ?>
	<!--===================MAIN=====================-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="phai" style="background-color:transparent">

					<?php
					$p->xuatthucdon("select * from thucdon order by maThucDon asc");
					?>
					<br />

					<form id="" name="form1" method="post" action="">
						<table width="800" border="1" align="center" dir="ltr">

							<tr style="border-bottom:1px solid black">
								<td style="border-right:1px solid black">Danh sách món ăn</td>
								<td>
									<?php
									echo $p->monan("select * from monchinh where maThucDon = '$laymaThucDon' ");
									?>
								</td>
							</tr>

						</table>
						<?php
						switch ($_REQUEST['nut']) {
							case 'Thêm': {
									if (isset($_SESSION['user'])) {
										$user = $_SESSION['user'];
										$check = "select * from giohang where Username='$user' and MaMon='$mamon'";
										if ($p->kiemtragiohang($check) == 1) {
											$sql = "update giohang set SoLuong=SoLuong+$soluong where Username='$user' and MaMon='$mamon'";
											if ($p->themsuagiohang($sql) == 1) {
												echo '<script language="javascript">alert("Cập nhật giỏ hàng thành công");</script>';
												echo '<script language="javascript">window.location="../QuanLyBepAn/xem-mon-an.php?mamon=' . $mamon . '";</script>';
											} else {
												echo '<script language="javascript">alert("Không thành công");</script>';
												echo '<script language="javascript">window.location="../QuanLyBepAn/xem-mon-an.php?mamon=' . $mamon . '";</script>';
											}
										} else {
											$sql = "insert into giohang(Username, MaMon, SoLuong) 
											values ('$user', '$mamon', '$soluong')";
											if ($p->themsuagiohang($sql) == 1) {
												echo '<script language="javascript">alert("Thêm vào giỏ hàng thành công");</script>';
												echo '<script language="javascript">window.location="../QuanLyBepAn/xem-mon-an.php?mamon=' . $mamon . '";</script>';
											} else {
												echo '<script language="javascript">alert("Không thành công");</script>';
												echo '<script language="javascript">window.location="../QuanLyBepAn/xem-mon-an.php?mamon=' . $mamon . '";</script>';
											}
										}
									} else {
										echo '<script language="javascript">alert("Vui lòng đăng nhập");</script>';
										echo '<script language="javascript">window.location="../QuanLyBepAn/xem-mon-an.php?mamon=' . $mamon . '";</script>';
									}
									break;
								}
						}
						$ngay = $p->xuatngay("select ngayLap from thucdon where maThucDon = '$laymaThucDon'");
						$_SESSION['ngay'] = $ngay;

						?>
					</form>
				</div>
			</div>
		</div>
		<?php include("footer.php"); ?>