<?php
    session_start();
    include('../cls/clslogin.php');
    $p = new login();
    if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])){
        $p -> confirmlogin($_SESSION['id'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['phanquyen']);
    }
    else{
        header('location:../login');
    }
?>
<?php 
    include('../cls/clsadmin.php');
    $p = new admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
</head>
<body>
    <form id="form1" name="form1" method="post" enctype="multipart/form-data">
        <table width="600" border="1" align="center" cellpadding="5" cellspacing="0">
            <tbody>
                <tr>
                    <td colspan="2" align="center" valign="middle"><strong>QUẢN LÝ MÓN ĂN</strong></td>
                </tr>
                <tr>
                    <td width="157" align="left" valign="middle"><strong>Loại món ăn</strong></td>
                    <td width="617" align="left" valign="middle">
                        <?php
                            $p -> load_loaimonan("select * from loaimonan order by Ten asc")
                        ?>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="middle"><strong>Nhập mã món</strong></td>
                    <td align="left" valign="middle"><input type="text" id="txtma" name="txtma" size="50"></td>
                </tr>
                <tr>
                    <td align="left" valign="middle"><strong>Nhập tên món</strong></td>
                    <td align="left" valign="middle"><input type="text" id="txtten" name="txtten" size="50"></td>
                </tr>
                <tr>
                    <td align="left" valign="middle"><strong>Nhập giá</strong></td>
                    <td align="left" valign="middle"><input type="text" id="txtgia" name="txtgia" size="50"></td>
                </tr>
                <tr>
                    <td align="left" valign="middle"><strong>Nhập mô tả</strong></td>
                    <td align="left" valign="middle"><textarea name="txtmota" id="txtmota" cols="50" rows="6"></textarea></td>
                </tr>
                <tr>
                    <td align="left" valign="middle"><strong>Nhập đánh giá</strong></td>
                    <td align="left" valign="middle"><textarea name="txtdg" id="txtdg" cols="50" rows="6"></textarea></td>
                </tr>
                <tr>
                    <td align="left" valign="middle"><strong>Hình ảnh</strong></td>
                    <td align="left" valign="middle"><input type="file" id="myfile" name="myfile"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" valign="middle">
                        <input type="submit" id="nut" name="nut" value="Thêm món ăn">
                        <input type="submit" id="nut" name="nut" value="Xóa món ăn">
                        <input type="submit" id="nut" name="nut" value="Sửa món ăn">
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
            switch($_POST['nut']){
                case 'Thêm món ăn':{
                    $ma = $_REQUEST['txtma'];
                    $ten = $_REQUEST['txtten'];
                    $gia = $_REQUEST['txtgia'];
                    $mota = $_REQUEST['txtmota'];
                    $dg = $_REQUEST['txtdg'];
                    $loaimon = $_REQUEST['loaimon'];
                    $name = $_FILES['myfile']['name'];
                    $type = $_FILES['myfile']['type'];
                    $tmp_name = $_FILES['myfile']['tmp_name'];
                    if($ma!='' && $ten!='' && $gia!='' && $mota!='' && $dg!=''){
                        if($type == 'image/png' || $type == 'image/jpeg'){
                            $name=time()."_".$name;
                            if($p -> uphinh($name, "../img", $tmp_name)==1){
                                if($p->themxoasua("insert into monan (MaMon, TenMon, Gia, MoTa, DanhGia, HinhAnh, Loai) 
                                                    values ('$ma', '$ten', '$gia', '$mota', '$dg', '$name', '$loaimon')")==1){
                                    echo "<center>Thêm thành công</center>";
                                }
                                else{
                                    echo "<center>Không thành công</center>";
                                }
                            }
                            else{
                                echo '<center>Tải hình không thành công</center>';
                            }
                        }
                        else{
                            echo '<center>Vui lòng chọn file png</center>';
                        }
                    }
                    else{
                        echo '<center>Vui lòng nhập đầy đủ thông tin</center>';
                    }
                    break;
                }

                case 'Xóa món ăn':{

                }

                case 'Sửa món ăn':{

                }
            }
        ?>
    </form>
</body>
</html>