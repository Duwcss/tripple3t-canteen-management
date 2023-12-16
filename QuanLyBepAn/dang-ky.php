<?php 
    include('cls/clsdangnhap.php'); 
    $p = new login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dang-nhap.css">
    <script src="../js/login.js"></script>
    <title>Đăng ký</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form id="form1" name="form1" method="post">
                <center><img src="img/logo.jpg" alt="logo" style="width: 20%;"></center>
                <table width="600" border="0" align="center" cellpadding="5" cellspacing="0" class="col-md-6 col-md-offset-3">
                    <tbody>
                        <tr>
                            <td width="200" align="left" valign="midle"><Strong>Họ và tên</Strong></td>
                            <td width="400" align="left" valign="midle">
                                <input type="text" name="txthovaten" id="txthovaten" size="50" placeholder="Nguyễn Văn A">
                            </td>
                        </tr>
                        <tr>
                            <td width="150" align="left" valign="midle"><Strong>Username</Strong></td>
                            <td width="350" align="left" valign="midle">
                                <input type="text" name="txtuser" id="txtuser" size="50" placeholder="Chỉ nhập chữ cái và số">
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="midle"><Strong>Password</Strong></td>
                            <td align="left" valign="midle">
                                <input type="password" name="txtpass" id="txtpass" size="50" placeholder="Chỉ nhập chữ cái và số">
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="midle"><Strong>Re-password</Strong></td>
                            <td align="left" valign="midle">
                                <input type="password" name="txtrepass" id="txtrepass" size="50" placeholder="Nhập lại mật khẩu">
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="midle"><Strong>Email</Strong></td>
                            <td align="left" valign="midle">
                                <input type="text" name="txtemail" id="txtemail" size="50" placeholder="abc123@gmail.com">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" valign="middle">
                                <input type="submit" name="nut" id="nut" value="Đăng Ký">
                                <input type="reset" name="reset" id="reset" value="Reset">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" valign="middle">
                                <a href="dang-nhap.php">Đã có tài khoản</a>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>

                <div align="center">
                    <?php
					
                        switch($_POST['nut']){
                            case 'Đăng Ký':{
                                $hovaten = $_REQUEST['txthovaten'];
                                $user = $_REQUEST['txtuser'];
                                $pass = $_REQUEST['txtpass'];
                                $repass = $_REQUEST['txtrepass'];
                                $email = $_REQUEST['txtemail'];
                                if($hovaten!='' &&$user!='' && $pass!='' && $repass!='' && $email!=''){
                                    if($pass==$repass){
                                       $hoTenPattern = '/^[\p{Lu}][\p{L} ]*$/u';
										if (preg_match($hoTenPattern, $hovaten)) {
											// Kiểm tra username theo biểu thức chính quy
											$usernamePattern = '/^[a-zA-Z0-9]+$/';
											if (preg_match($usernamePattern, $user)) {
												// Kiểm tra mật khẩu theo biểu thức chính quy
												$passwordPattern = '/^[a-zA-Z0-9]+$/';
												if (preg_match($passwordPattern, $pass)) {
													// Mật khẩu hợp lệ
													$emailPattern = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z-]+\.[a-zA-Z]{2,6}$/';
													if(preg_match($emailPattern,$email))
													{
														$check = "select * from taikhoan where username = '$user' and hovaten = '$hovaten'";
														if($p->kiemtrataikhoan($check)==1)
														{
															echo '<script language="javascript">alert("Tài khoản đã có trong hệ thống");</script>';
															echo '<script language="javascript">window.location="../QuanLyBepAn/dang-ky.php";</script>';
														}
														else
														{
															$p->themtaikhoan($user, md5($pass), $hovaten, $email);
														}
													}
													else
													{
														echo '<script language="javascript">alert("Email không hợp lệ");</script>';
														echo '<script language="javascript">window.location="../QuanLyBepAn/dang-ky.php";</script>';
													}
												} else {
													echo '<script language="javascript">alert("Mật khẩu không hợp lệ");</script>';
													echo '<script language="javascript">window.location="../QuanLyBepAn/dang-ky.php";</script>';
												}
											} else {
												echo '<script language="javascript">alert("Username không hợp lệ");</script>';
												echo '<script language="javascript">window.location="../QuanLyBepAn/dang-ky.php";</script>';
											}
										} else {
											echo '<script language="javascript">alert("Họ tên không hợp lệ");</script>';
											echo '<script language="javascript">window.location="../QuanLyBepAn/dang-ky.php";</script>';
										}
                                    }
                                    else {
                                        echo '<script language="javascript">alert("Xác nhận password không đúng");</script>';
                                        echo '<script language="javascript">window.location="../QuanLyBepAn/dang-ky.php";</script>';
                                    } 
                                }
                                else{
                                    echo '<script language="javascript">alert("Vui lòng nhập đầy đủ thông tin");</script>';
                                    echo '<script language="javascript">window.location="../QuanLyBepAn/dang-ky.php";</script>';
                                }
                                break;
                            }
                        }
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>