<?php
    include("clsthucdon.php");
    class giohang extends thucdon{
        public function xuatgiohang($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $i = mysql_num_rows($ketqua);
            if($i>0){
                echo '<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 border-end border-secondary-subtle">
                        <h5><strong>Có '.$i.' món ăn trong giỏ hàng</strong></h5>
                        <table class="table table-secondary table-hover" align="center" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="50" height="50" align="center" valign="middle"><strong>STT</strong></td>
                                    <td width="400" height="50" align="center" valign="middle"><strong>Tên Món</strong></td>
                                    <td width="100" height="50" align="center" valign="middle"><strong>Số Lượng</strong></td>
                                    <td width="100" height="50" align="center" valign="middle"><strong>Đơn Giá</strong></td>
                                    <td width="120" height="50" align="center" valign="middle"><strong>Thành Tiền</strong></td>
                                    <td width="120" height="50" align="center" valign="middle"><strong>Ngày đặt</strong></td>
                                    <td width="120" height="50" align="center" valign="middle"><strong></strong></td>
                                </tr>';
                $dem = 1;
                while($row = mysql_fetch_array($ketqua)){
                    $idgiohang = $row['id'];
                    $TenMon = $row['TenMon'];
                    $SoLuong = $row['SoLuong'];
                    $Gia = $row['Gia'];
                    $Ngaydat = $row['Ngaydat'];
                    $ThanhTien = $row['ThanhTien'];
                        echo '  <form method="post" action="gio-hang.php?id='.$idgiohang.'">
                                    <tr>
                                        <td align="center" valign="middle">'.$dem.'</td>
                                        <td align="center" valign="middle">'.$TenMon.'</td>
                                        <td align="center" valign="middle"><input type="number" name="soluong" class="soluong" min="1" value="'.$SoLuong.'"></td>
                                        <td align="center" valign="middle">'.number_format($Gia).'đ</td>
                                        <td align="center" valign="middle">'.number_format($ThanhTien).'đ</td>
                                        <td align="center" valign="middle">'.$Ngaydat.'</td>
                                        <td align="center" valign="middle">
                                            <input type="submit" name="nut" id="nut" value="Sửa">
                                            <input type="submit" name="nut" id="nut" value="Xóa">
                                        </td>
                                    </tr>
                                </form>';
                    $dem++;
                    $TongTien+=$ThanhTien;
                }            
                echo '      </tbody>
                        </table>
                        <a href="../QuanLyBepAn/thucdon-user.php"><input type="submit" name="nut" class="xemthem" value="Xem món khác"></a>
                        <a href="../QuanLyBepAn/ds-suatan.php">
						<form action="gio-hang.php" method="post">
							<input type="submit" name="nut" class="xemthem" value="Đặt suất">
							<input type="hidden" name="tongtien" value="'.number_format($TongTien).'">
						</form>
						</a>
                    </div>
                    
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                        <table align="center" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="200" height="50" align="left" valign="middle"><strong>Tổng tiền:</strong></td>
                                    <td width="200" height="50" align="right" valign="middle">'.number_format($TongTien).'đ</td>
                                </tr>
                                <tr style="">
                                    <td colspan="2" align="center" valign="middle"><a href="../QuanLyBepAn/vnpay_php/vnpay_pay.php"><button class="nutthanhtoan">Tiến Hành Thanh Toán</button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>';

            }
            else{
                echo '<div class="col-xl-4 col-lg-4 col-md-4 offset-md-4 bg-white rounded p-4">
                        <img class="gio-hang-trong" src="img/gio-hang-trong.png" alt="giỏ hàng trống">
                        <center><strong style="font-size: 20px; color: red; font-weight: bold;">Chưa có món ăn nào trong giỏ hàng</strong></center>
                        <center><a href="../QuanLyBepAn/thuc-don.php"><button style="margin-top: 10px; border-radius: 10px;">Order Ngay</button></a></center>
                    </div>';
            }
            mysql_close($link);
        }
		
		function luugiohang($sql)
		{
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$i = mysql_num_rows($ketqua);
		
			if ($i > 0) {
				session_start();
				if($_POST['nut'])
				{
					$tt = $_POST['tongtien'];	
					$_SESSION['tongtien'][]=$tt;
				}
				while ($row = mysql_fetch_array($ketqua)) {
					$idgiohang = $row['id'];
					$ngaydat = $row['Ngaydat'];
					$username = $_SESSION['user'];
					$tongtien = (int) str_replace(',', '', $_SESSION['tongtien'][0]);
					$sqlInsert = "INSERT INTO suatan (idGioHang, ngayDat, userName,tongTien) VALUES ('$idgiohang', '$ngaydat', '$username','$tongtien')";
		
					// Thực hiện truy vấn insert vào bảng suatan
					if (!mysql_query($sqlInsert, $link)) {
						// Xử lý lỗi
						echo 'Lỗi SQL: ' . mysql_error($link);
						return 0; // Trả về 0 để biểu thị thất bại
					}
					$sqlUpdate = "UPDATE giohang SET TrangThai = 1 WHERE Username = '$username'";
					mysql_query($sqlUpdate, $link);
				}
				// Đóng kết nối
				mysql_close($link);
				return 1; // Trả về 1 để biểu thị thành công
			} else {
				// Xử lý lỗi nếu không có dữ liệu từ truy vấn
				echo 'Không có dữ liệu từ truy vấn';
				return 0; // Trả về 0 để biểu thị thất bại
			}
		}

        public function xoasuagiohang($sql){
			$link = $this->connect();
			if(mysql_query($sql, $link)){
				return 1;
			}
			else{
				return 0;	
			}
		}
    }
?>