<?php
	class qlba
	{
		public function connect()
		{
			$con = mysql_connect("localhost","Tripple3T","123456");
			if($con)
			{
				$db = mysql_select_db("qlba");
				mysql_query("SET NAMES UTF8");
				return $con;
			}
			else
			{
				echo'khong ket noi duoc co so du lieu';
				exit();
			}
		}	
		function xuatthucdon($sql)
			{
				$link = $this->connect();
				$ketqua = mysql_query($sql,$link);
				$i=mysql_num_rows($ketqua);
				if($i>0)
				{
					echo '<h2 align="center">Thực đơn ngày mai</h2>';
					echo '<table width="800" border="1" align="center">
							<tr>
							  <td width="180" align="center" >Mã thực đơn</td>
							  <td width="391" align="center">Ngày lập</td>
							  <td width="207" align="center">Giá</td>
							</tr>';
					while($row = mysql_fetch_array($ketqua))
					{
						$maThucDon = $row['maThucDon'];
						$ngayLap = $row['ngayLap'];
						$Gia = $row['gia'];
						
						echo '<tr>
								  <td id="maThucDon" align="center";"><a href="?laymaThucDon='.$maThucDon.'">'.$maThucDon.'</a></td>
								  <td id="ngayLap" name="ngayLap" align="center"><a href="?laymaThucDon='.$maThucDon.'">'.$ngayLap.'</a></td>
								  <td id="Gia" align="center"><a href="?laymaThucDon='.$maThucDon.'">'.$Gia.'<sup>đ</sup></a></td>
								</tr>';
					}
					echo '</table>';
				}
				else
				{
					echo '<table width="800" border="1" align="center">
							<tr>
							  <td colspan="3" align="center">Danh sách thực đơn</td>
							</tr>
							<tr>
							  <td width="180" align="center">Mã thực đơn</td>
							  <td width="391" align="center">Ngày lập</td>
							  <td width="207" align="center">Giá</td>
							</tr>';
					echo'	<table width="800" border="1" align="center">
							<tr>
							<td width="600" align="center">Không có dữ liệu</td>
							</tr>';
				}
			}
			function monan($sql)
			{
				$link = $this->connect();
				$ketqua = mysql_query($sql,$link);
				$i=mysql_num_rows($ketqua);
				if($i>0)
				{
					while($row = mysql_fetch_array($ketqua))
					{
						$tenmonan = $row['TenMon'];
						$mamon = $row['MaMon'];
						$Gia = $row['GiaMon'];
						$HinhAnh = $row['HinhAnhMon'];
						$Loai = $row['Loai'];
						$ma = $row['maThucDon'];
						echo '<div style="margin-bottom:20px;border:1px solid black;padding:-10px;">
								<div align="center"><img src="img/'.$Loai.'/'.$HinhAnh.'" alt="'.$tenmonan.'" width="200px" height="150px"></div>
								<div align="center">'.$tenmonan.'</div>
								<div align="center">Giá: '.$Gia.'<sup>đ</sup></div>
								<div align="center">
								<div class="tt_nut">
									<button type="button" name="nut" id="nut" value="Chọn món"><a href="xem-mon-an.php?mamon='.$mamon.'" style="text-decoration: none;color:black;">Chọn món</a></button></div>
								</div>
							</div>
							';
					}
				}
			}
			public function xuatngay($query) {
				// Thực hiện truy vấn và trả về giá trị
				// Giả sử rằng bạn sử dụng MySQLi để thực hiện truy vấn
				$mysql = new mysqli("localhost", "Tripple3T", "123456", "qlba");
				
				// Kiểm tra kết nối
				if ($mysql->connect_error) {
					die("Kết nối không thành công: " . $mysql->connect_error);
				}
		
				// Thực hiện truy vấn
				$result = $mysql->query($query);
		
				// Kiểm tra và lấy giá trị ngày
				if ($result && $row = $result->fetch_assoc()) {
					return $row['ngayLap'];
				} else {
					return "Không có kết quả";
				}
		
				// Đóng kết nối
				$mysql->close();
			}
			 public function themsuagiohang($sql){
				$link = $this->connect();
				if(mysql_query($sql, $link)){
					return 1;
				}
				else{
					return 0;	
				}
			}
	
			public function kiemtragiohang($sql){
				$link = $this->connect();
				$ketqua = mysql_query($sql, $link);
				$i = mysql_num_rows($ketqua);
				if($i>0){
					return 1;
				}
				return 0;
				mysql_close($link);
			}
			public function themxoasua($sql)
			{
				$link = $this->connect();
				if(mysql_query($sql,$link))
				{
					return 1;	
				}
				else
				{
					return 0;
				}
			} 
			function chotcot($sql)
			{
				$link = $this->connect();
				$ketqua = mysql_query($sql,$link);
				$i=mysql_num_rows($ketqua);
				$giatri = '';
				if($i>0)
				{
					while($row = mysql_fetch_array($ketqua))
					{
						$giatri = $row[0];
					}
				}
				return $giatri;
			}
	}
?>