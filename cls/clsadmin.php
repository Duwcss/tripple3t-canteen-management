<?php
    include("clsqlba.php");
    class admin extends qlba{
        public function load_loaimonan($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $i = mysql_num_rows($ketqua);
            if($i>0){
                echo '<select name="loaimon" id="loaimon">
                        <option>Chọn loại món ăn</option>';
                while($row = mysql_fetch_array($ketqua)){
                    $id = $row['id'];
                    $Ten = $row['Ten'];
                    echo '<option value="'.$id.'">'.$Ten.'</option>';
                }
                echo '</select>';
            }
            else{
                echo 'Đang cập nhật dữ liệu';
            }
        }

        public function themxoasua($sql){
            $link = $this->connect();
            if(mysql_query($sql, $link)){
                return 1;
            }
            else{
                return 0;
            }
        }

        public function uphinh($name, $folder, $tmp_name){
            if($name!='' && $folder!='' && $tmp_name!=''){
                $newname = $folder.'/'.$name;
                if(move_uploaded_file($tmp_name, $newname)){
                    return 1;
                }
                else{
                    return 0;
                }
            }
            else{
                return 0;
            }
        }
    }
?>