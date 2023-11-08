<?php
    class login{
        public function connect(){
            $con = mysql_connect("localhost", "Tripple3T", "123456");
            if(!$con){
                echo "Khong ket noi duoc csdl";
                exit();
            }
            else{
                mysql_select_db("qlba");
                mysql_query("set names utf8");
                return $con;
            }
        }

        public function mylogin($user, $pass){
            $pass=md5($pass);
            $sql = "select id, username, password, phanquyen from taikhoan where username='$user' and password='$pass' limit 1";
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $i = mysql_num_rows($ketqua);
            if($i>0){
                while($row=mysql_fetch_array($ketqua)){
                    $id = $row['id'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $phanquyen = $row['phanquyen'];
                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['user'] = $username;
                    $_SESSION['pass'] = $password;
                    $_SESSION['phanquyen'] = $phanquyen;
                    header('location:../admin/');
                }
            }
            else{
                echo "Sai username hoặc password";
            }
        }

        public function confirmlogin($id, $user, $pass, $phanquyen){
            $sql = "select id, username, password, phanquyen from taikhoan where id='$id' and username='$user' and password='$pass' and phanquyen='$phanquyen' limit 1";
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $i = mysql_num_rows($ketqua);
            if($i!=1){
                header('location:../index.php');
            }
        }
    }
?>