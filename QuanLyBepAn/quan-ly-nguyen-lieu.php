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
    if(isset($_REQUEST['manvl'])) $manvl = $_REQUEST['manvl'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quản Lí Nguyên Liệu</title>
    <title>Document</title>
    <link rel="stylesheet" href="css/quanly.css">
    <style>
      .chucnang{ color: black; background-color: #b9b9b9; border-radius: 10px; max-height: 238px; margin-top: 20px;}
.chucnang li{ width: auto; height: 40px; border-top: 1px solid white; margin-left: -44px; margin-right: -12px; padding-left: 14px; list-style: none; line-height: 40px; transition: background-color 0.5s ease;}
.chucnang li:hover { background: gray; border-radius: 10px;}
.chucnang a{ text-decoration: none; color: black; font-weight: bold; display: block;}

.timkiem{ margin-top: 10px; float: right;}

#form1 {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 5px;
}

#txtma, #txtten, #txtmota, #txtgia, #hinhanh, #loai, #txttonkho, #txtdongia, #txtdonvi{
    width: 350px;
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ced4da;
    border-radius: 4px;
}
#txtmanl, #txttennl, #txttonkho, #txtdongia, #txtdonvi{
	width: 300px;
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

#nut, #openmodal {
    margin-top: 10px;
    border-radius: 10px;
    cursor: pointer;
}
.modal-content {
    width: 535px;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 5px;
}
.modal-header .close{
    border: none;
    background-color: white;
    font-weight:bold;
    font-size: 20px;
}
    </style>
<?php include("header.php"); ?>
    <!--===================MAIN=====================-->
    <div class="container-fluid">
        <div class="row">
            <div class="chucnang col-xl-2 col-lg-2 col-md-3 col-sm-3">
                <h4><strong>CHỨC NĂNG</strong></h4>
				<?php $p->xuatchucnang(); ?>
            </div>
    
            <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9">
                <table class="table table-bordered table-secondary table-hover" width="1100" border="1" align="center" cellpadding="0" cellspacing="0">
                <center><h5><strong>DANH SÁCH NGUYÊN LIỆU</strong></h5></center>
                    <tbody>
                        <tr>
                            <td width="50" height="50" align="center" valign="middle"><strong>STT</strong></td>
                            <td width="100" height="50" align="center" valign="middle"><strong>MÃ NGUYÊN LIỆU</strong></td>
                          <td width="100" height="50" align="center" valign="middle"><strong>TÊN NGUYÊN LIỆU</strong></t>
                          <td width="50" height="50" align="center" valign="middle"><strong>TỒN KHO</						strong></td>
                            <td width="50" height="50" align="center" valign="middle"><strong>ĐƠN GIÁ</strong></td>
                            <td width="50" height="50" align="center" valign="middle"><strong>ĐƠN VỊ</strong></td>
                            <td width="50" height="50" align="center" valign="middle"></td>
                        </tr>
                        <?php
						$p->loadnguyenlieu("select * from nvl order by MaNVL asc");
						?>
                      </tbody>
                    </table>
                     <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9">
                            
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3">
                      <button type="button" id="openmodal" data-toggle="modal" data-target="#modal1">Thêm Nguyên Liệu</button>
                      
                    </div>
                     </div>
                     <!--Modal thêm Nguyên liệu-->
    <div class="modal fade" id="modal1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="width: 535px;">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Thêm Nguyên Liệu</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>    
                <div class="modal-body">
                    <form method="post" onsubmit="return checkinput(event)" enctype="multipart/form-data" name="form1" id="form1">
                      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td valign="middle" style="text-align: left">Nhập Mã Nguyên Liệu</td>
                            <td valign="middle" style="text-align: left"><input name="txtmanl" type="text" id="txtmanl" size="50"></td>
                          </tr>
                          <tr>
                            <td valign="middle" style="text-align: left">Nhập Tên Nguyên Liệu</td>
                            <td valign="middle" style="text-align: left"><input name="txttennl" type="text" id="txttennl" size="50"></td>
                          </tr>
                          <tr>
                          	<td valign="middle" style="text-align: left">Nhập Tồn Kho</td>
                            <td valign="middle" style="text-align: left"><input name="txttonkho" type="text" id="txttonkho" size="50"></td>
                          </tr>
                          <tr>
                            <td valign="middle" style="text-align: left">Nhập Đơn Giá</td>
                            <td valign="middle" style="text-align: left"><input name="txtdongia" type="text" id="txtdongia" size="50"></td>
                          </tr>
                          <tr>
                          	<td valign="middle" style="text-align: left">Nhập Đơn Vị</td>
                            <td valign="middle" style="text-align: left"><input name="txtdonvi" type="text" id="txtdonvi" size="50"></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" valign="middle" style="text-align: center">
                            	<input type="submit" name="nut" id="nut" value="Thêm">
                                <input type="button" id="nut_huy" value="Hủy" style="border: 2px solid black; border-radius: 10px">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <?php
                        switch($_REQUEST['nut']){
                            case 'Thêm':{
                                $manvl = $_REQUEST['txtmanl'];
                                $tennvl = $_REQUEST['txttennl'];
                                $tonkho = $_REQUEST['txttonkho'];
                                $dongia = $_REQUEST['txtdongia'];
                                $donvi = $_REQUEST['txtdonvi'];
                                if($p->themxoasuamonan("insert into nvl(MaNVL, TenNVL, TonKho, DonGia, DonVi)
                                        	values ('$manvl', '$tennvl', '$tonkho', '$dongia', '$donvi')")==1){
                                    	echo '<script language="javascript">alert("Thêm nguyên liệu thành công");</script>';
                                      echo '<script language="javascript">window.location="quan-ly-nguyen-lieu.php";</script>';
					}
                                    else{
                                      echo '<script language="javascript">alert("Thêm nguyên liệu không thành công");</script>';	
                                      echo '<script language="javascript">window.location="quan-ly-nguyen-lieu.php";</script>';
                                    }
                                  echo '<script language="javascript">window.location="quan-ly-nguyen-lieu.php";</script>';
                                }
                                break;
                            }
                      ?>
                    </form>
                </div>
            </div>
        </div>
	  </div>
      <!--Modal xóa, sửa món ăn-->
    <div class="modal fade" id="modal2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="width: 535px;">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Thông Tin Nguyên Liệu</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>    
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" name="form1" id="form1">
                      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td valign="middle" style="text-align: left">Mã Nguyên Liệu</td>
                            <td valign="middle" style="text-align: left"><input name="txtmanl" type="text" id="txtmanl" size="50" value="<?php echo $p->choncot("select MaNVL from nvl where MaNVL='$manvl' "); ?>"></td>
                          </tr>
                          <tr>
                            <td valign="middle" style="text-align: left">Tên Nguyên Liệu</td>
                            <td valign="middle" style="text-align: left"><input name="txttennl" type="text" id="txttennl" size="50" value="<?php echo $p->choncot("select TenNVL from nvl where MaNVL='$manvl' "); ?>"></td>
                          </tr>
                          <tr>
                            <td valign="middle" style="text-align: left">Tồn Kho</td>
                            <td valign="middle" style="text-align: left"><input name="txttonkho" type="text"" id="txttonkho" size="50" value="<?php echo $p->choncot("select TonKho from nvl where MaNVL='$manvl' "); ?>"></td>
                          </tr>
                          <tr>
                            <td valign="middle" style="text-align: left">Đơn Giá</td>
                            <td valign="middle" style="text-align: left"><input name="txtdongia" type="text" id="txtdongia" size="50" value="<?php echo $p->choncot("select DonGia from nvl where MaNVL='$manvl' "); ?>"></td>
                          </tr>
                          <tr>
                            <td valign="middle" style="text-align: left">Đơn Vị</td>
                            <td valign="middle" style="text-align: left"><input name="txtdonvi" type="text" id="txtdonvi" size="50" value="<?php echo $p->choncot("select DonVi from nvl where MaNVL='$manvl' "); ?>"></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" valign="middle" style="text-align: center">
                            	<input type="submit" name="nut" id="nut" value="Xóa">
                              <input type="submit" name="nut" id="nut" value="Sửa">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <?php
                        switch($_REQUEST['nut']){
                            case 'Xóa':{
                                  if ($p->themxoasuamonan("delete from nvl where MaNVL='$manvl'")==1){
                                    echo '<script language="javascript">alert("Xóa nguyên liệu thành công");</script>';
                                    echo '<script language="javascript">window.location="quan-ly-nguyen-lieu.php";</script>';
                                  } 
                                  else {
                                    echo '<script language="javascript">alert("Xóa nguyên liệu không thành công");</script>';
                                    echo '<script language="javascript">window.location="quan-ly-nguyen-lieu.php";</script>';
                                  } 
                              }
                              break;
							
                            case 'Sửa':{
                                $manvl = $_REQUEST['txtmanl'];
                                $tennvl = $_REQUEST['txttennl'];
                                $tonkho = $_REQUEST['txttonkho'];
                                $dongia = $_REQUEST['txtdongia'];
                                $donvi = $_REQUEST['txtdonvi'];
                              if($manvl!='' && $tennvl!='' && $tonkho!='' && $dongia!='' && $donvi=''){
                                      // thực hiện cập nhật thông tin món ăn
                                      if ($p->themxoasuamonan("update nvl set MaNVL='$manvl', TenNVL='$tennvl', TonKho='$tonkho', DonGia='$dongia', DonVi='$donvi' WHERE MaNVL='$manvl'") == 1) {
                                        echo '<script language="javascript">alert("Sửa nguyên liệu thành công");</script>';
                                        echo '<script language="javascript">window.location="quan-ly-nguyen-lieu.php";</script>';
                                      } // đóng ngoặc đủ
									  else {
                                        echo '<script language="javascript">alert("Sửa nguyên liệu không thành công");</script>';
                                        echo '<script language="javascript">window.location="quan-ly-nguyen-lieu.php";</script>';
                                      } // đóng ngoặc đủ
                                    } // đóng  
                              else{
                                echo '<script language="javascript">alert("Vui lòng chọn nguyên liệu cần sửa");</script>';
                                echo '<script language="javascript">window.location="quan-ly-nguyen-lieu.php";</script>';
                              }
                              break;
                            }
							}
                     ?>
                    </form>
                </div>
            </div>
        </div>
	  </div>

  </div>               
<?php include("footer.php"); ?>
<!--js mở modal và xử lý dữ liệu-->
<script>
  $(document).ready(function () {
    $("#openmodal").click(function () {
      $("#modal1").modal("show");
    });

    $(".modal-header .close").click(function () {
      $("#modal1").modal("hide");
    });
	$("#nut_huy").click(function () {
      $("#modal1").modal("hide");
    });

    var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('manvl')) {
            $("#modal2").modal("show");
        }

    $(".modal-header .close").click(function () {
      $("#modal2").modal("hide");
    });
  });

  function checkinput(event){
    var ma = document.getElementById('txtmanl');
    var ten = document.getElementById('txttennl');
    var tonko = document.getElementById('txttonkho');
    var dongia = document.getElementById('txtdongia');
	var donvi = document.getElementById('txtdonvi');
    if(ma.value!="" && ten.value!="" && tonkho.value!="" && dongia.value!="" && donvi.value!="")
    alert("Vui Lòng nhập đầy đủ thông tin");
    event.preventDefault();
    return 0;
  }
</script>
                