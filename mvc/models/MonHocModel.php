<?php 
class MonHocModel extends DB{

    public function showMonHoc(){           
            $sql = 'select maMonHoc , tenMonHoc, soTinChi, theLoai,tsQT, tsCK from MonHoc ';
            $stmt2 = sqlsrv_query($this->conn,$sql);
            if ($stmt2 === false) {
                echo "Error in executing query.</br>";
                die(print_r(sqlsrv_errors(), true));
            } else {
                return $stmt2;
            }
    }
    
}


?>