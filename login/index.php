<?php 
    include('../cls/clslogin.php'); 
    $p = new login();
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/login.js"></script>
    <title>Đăng nhập</title>
</head>
<body>
    <form id="form1" name="form1" method="post">
        <center><img src="../img/logo.jpg" alt="logo"></center>
        <table width="600" border="0" align="center" cellpadding="5" cellspacing="0">
            <tbody>
                <tr>
                    <td width="150" align="left" valign="midle"><Strong>Nhập username</Strong></td>
                    <td width="350" align="left" valign="midle">
                        <input type="text" name="txtuser" id="txtuser" size="50">
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="midle"><Strong>Nhập password</Strong></td>
                    <td align="left" valign="midle">
                        <input type="text" name="txtpass" id="txtpass" size="50">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" valign="middle">
                        <input type="submit" name="nut" id="nut" value="Đăng Nhập">
                        <input type="reset" name="reset" id="reset" value="Reset">
                    </td>
                </tr>
            </tbody>
        </table>

        <div align="center">
            <?php
                switch($_POST['nut']){
                    case 'Đăng Nhập':{
                        $user = $_REQUEST['txtuser'];
                        $pass = $_REQUEST['txtpass'];
                        if($user!='' && $pass!=''){
                            $p -> mylogin($user, $pass);
                        }
                        else{
                            echo 'Vui lòng nhập đầy đủ thông tin';
                        }
                        break;
                    }
                }
            ?>
        </div>
    </form>
</body>
</html>