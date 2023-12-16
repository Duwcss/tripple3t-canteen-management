<?php
  include("cls/clssuatan.php");
  $p = new suatan();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Suất Ăn</title>

<?php include("header.php"); ?>
    <!--===================MAIN=====================-->
 	<div class="row">

        	<?php
				$user = $_SESSION['user'];
            	$p->xuatsuatan("select * from suatan where userName = '$user' order by Ngaydat asc");
			?>
    </div>
<?php include("footer.php"); ?>