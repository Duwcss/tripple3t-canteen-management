<?php
session_start();

// Hủy phiên đăng nhập
session_destroy();

// Chuyển hướng về trang chủ
header("Location: ../QuanLyBepAn/trang-chu.php");
exit();
?>
