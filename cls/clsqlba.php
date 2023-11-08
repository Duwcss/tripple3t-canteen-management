<?php
    class qlba{
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

        public function xuatmonan($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $i = mysql_num_rows($ketqua);
            if($i>0){
                while($row=mysql_fetch_array($ketqua)){
                    $MaMon = $row['MaMon'];
                    $TenMon = $row['TenMon'];
                    $Gia = $row['Gia'];
                    $MoTa = $row['MoTa'];
                    $HinhAnh = $row['HinhAnh'];
                    $DanhGia = $row['DanhGia'];
                    $Loai = $row['Loai'];
                    echo '<div class="monan">
                                <div class="monan_hinh"><img src="../QLBA/img/'.$HinhAnh.'" alt="'.$TenMon.'" width="140" height="190"></div>
                                <div class="monan_nd">
                                    <div class="monan_ten">'.$TenMon.'</div>
                                    <div class="monan_mota">'.$MoTa.'</div>
                                    <div class="monan_gia">'.$Gia.' VND</div>
                                    <div class="monan_dg">'.$DanhGia.'</div>
                                </div>
                          </div>';
                }
            }
            else{
                echo "Không có dữ liệu";
            }
            mysql_close($link);
        }

        public function timkiem($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $i = mysql_num_rows($ketqua);
            if($i>0){
                $this->xuatmonan($sql);
            }
            else{
                echo 'Không có dữ liệu';
            }
        }
    }
?>