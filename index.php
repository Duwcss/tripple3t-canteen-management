<?php
    include("cls/clsqlba.php");
    $p = new qlba();
?>
<?php
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
	include ("class/cls.php");
	$p = new myupload();
	$p->confirmlogin($_SESSION['user'],$_SESSION['pass']);
}
else
{
	header('location:login\index.php');
}
?>
<?php
    if(isset($_GET['timkiem']) && !empty($_GET['timkiem'])){
        $key = $_GET['timkiem'];
        $sql = "select * from monan
            where TenMon like '%$key%' ";
                    
    }
    else{
        $sql = "select * from monan order by MaMon asc";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
<body>
    <div class="container">
        <div class="header">
            <img src="../QLBA/img/logo.jpg" alt="logo" width="200" height="133" style="margin-left: 5px; margin-top: 5px">
            <a href="http://localhost:8080/QLBA/login/"><button>Đăng nhập</button></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Diễn đàn</a></li>
                <li><a href="#">Tin tức</a></li>
                <li><a href="#">Hỏi đáp</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>

            <form action="" method="get" class="form_tmkiem">
                <input type="text" name="timkiem" placeholder="Nhập từ khóa tìm kiếm..." 
                        value="<?php 
                                    if(isset($_GET['timkiem'])) echo $_GET['timkiem'];
                                ?>">
                <input type="submit" value="Tìm">
            </form>
        </div>
        <div class="main">
            <div class="left"></div>
            <div class="right">
                <?php
                    $p -> timkiem($sql);
                ?>
            </div>
        </div>
        <div class="footer">
            <center>Tripple3T - Quản lý bếp ăn nhà hàng</center>
        </div>
    </div>
</body>

<style>  
    body{background-color: #dde1e2;}
    .container{
        width: 1200px;
        height: auto;
        margin: 6px auto;
    }
    .header{
        height: 150px;
        width: 100%;
        border: 2px solid black;
        border-radius: 10px;
        position: relative;
    }
    .header button{
        position: absolute;
        right: 10px;
        bottom: 10px;
    }
    .menu{
        width: 100%;
    }
    .menu ul{
        float: left;
        width: 900px;
        background: #1F568B;
        list-style-type: none;
        text-align: center;
    }
    .menu li{
        color: #f1f1f1;
        display: inline-block;
        width: 120px;
        height: 40px;
        line-height: 40px;
        margin-left: -5px;
    }
    .menu a {
        text-decoration: none;
        color: #fff;
        display: block;
    }
    .menu a:hover {
        background: #F1F1F1;
        color: #333;
    }
    .menu form{
        float: right;
        width: 250px;
        margin-top: 16px;
        padding-bottom: 3px;
        background: #1F568B;
        padding-left: 10px;
        padding-top: 2px;
    }
    .menu form input{
        height: 29px;
        border-radius: 10px;
    }
    .main{
        float: left;
        height: 500px;
        width: 100%;
    }
    .left{
        float: left;
        height: 500px;
        width: 20%;
        background-color: greenyellow;
    }
    .right{
        float: left;
        height: 500px;
        width: 80%;
        background-color: orange;
    }
    .footer{
        float: left;
        height: 150px;
        width: 100%;
        background-color: purple;
    }

    .monan{
        float: left;
        height: 200px;
        width: 300px;
        border: black 1px solid;
        border-radius: 10px;
        margin: 5px 5px;
        background-color: white;
        box-shadow: 5px 5px 15px -5px #000000;
    }
    .monan_hinh{
        float: left;
        width: 140px;
        height: 190px;
        padding: 5px 5px;
    }
    .monan_nd{
        float: right;
        width: 150px;
        height: 200px;
    }
    .monan_ten{
        float: left;
        height: 30px;
        width: 150px;
        color: blue;
        font-weight: bold;
        text-align: center;
    }
    .monan_gia{
        float: left;
        height: 30px;
        width: 150px;
        color: red;
        font-weight: bold;
        text-align: center;
    }
    .monan_mota{
        float: left;
        height: 110px;
        width: 150px;
        font-style: italic;
        text-align: justify;
    }
    .monan_gia{
        float: left;
        height: 30px;
        width: 150px;
        text-align: center;
    }
    .monan_dg{
        float: left;
        height: 30px;
        width: 150px;
        text-align: center;
    }

</style>
</head>
</html>