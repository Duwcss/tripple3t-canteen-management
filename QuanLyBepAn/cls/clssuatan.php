<?php
    include("clsthucdon.php");
    class suatan extends thucdon{
        public function xuatsuatan($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $i = mysql_num_rows($ketqua);
            if($i>0){
                echo '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 border-end border-secondary-subtle">
                        <table class="table table-secondary table-hover" align="center" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="50" height="50" align="center" valign="middle"><strong>STT</strong></td>
                                    <td width="400" height="50" align="center" valign="middle"><strong>Mã Giỏ Hàng</strong></td>
                                    <td width="100" height="50" align="center" valign="middle"><strong>Ngày đặt</strong></td>
									<td width="100" height="50" align="center" valign="middle"><strong>Tổng tiền</strong></td>
									<td width="100" height="50" align="center" valign="middle"><strong></strong></td>
                                </tr>';
                $dem = 1;
                while($row = mysql_fetch_array($ketqua)){
                    $idsuatan = $row['SuatAnID'];
                    $idgiohang = $row['idGioHang'];
                    $ngaydat = $row['ngayDat'];
					$username= $_SESSION['user'];
					$tongtien = $row['tongTien'];
                        echo '  <form method="post" action="suat-an.php?id='.$idsuatan.'">
                                    <tr>
                                        <td align="center" valign="middle">'.$dem.'</td>
                                        <td align="center" valign="middle">'.$idgiohang.'</td>
                                        <td align="center" valign="middle">'.$ngaydat.'</td>
										<td align="center" valign="middle">'.$tongtien.'</td>
                                        <td align="center" valign="middle">
                                            <input type="submit" name="nut" id="nut" value="Sửa">
                                            <input type="submit" name="nut" id="nut" value="Xóa">
                                        </td>
                                    </tr>
                                </form>';
                    $dem++;
                }
				echo '</tbody>
					</table>
					</div>';  
				   
			}
			else
			{
				echo '<tr><td ><b align="center">Chưa có suất ăn được đặt</b></td></tr>';	
			}
            mysql_close($link);
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