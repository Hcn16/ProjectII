<?php

class address extends DB
{


    public function showProvince()
    {
    
        $sql = "select code, full_name from provinces   ";
        $stmt2 = sqlsrv_query($this->conn, $sql);
        if ($stmt2 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt2;
        }

    }
   

    public function showDistrict(){
        

$sql = "select code, full_name from districts where province_code =    ".$_POST['provinceID'];
echo $sql;
$stmt2 = sqlsrv_query($this->conn, $sql);
if ($stmt2 === false) {
    echo "Error in executing query.</br>";
    die(print_r(sqlsrv_errors(), true));
        } else {

            while ($std = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
                echo ' <option value="' . $std['code'] . '">' . $std['full_name'] . '</option>';

            }
        }
    }

    public function showWard(){

        echo '<option value="">-- Chọn Xã---</option>';
        $sql = "select code, full_name from wards where district_code =    ".$_POST['districtID'];
        echo $sql;
        $stmt2 = sqlsrv_query($this->conn, $sql);
        if ($stmt2 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
                } else {
        
                    while ($std = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
                        echo ' <option value="' . $std['code'] . '">' . $std['full_name'] . '</option>';
        
                    }
                }
            }

            public function showTKB(){
                $MSSV = "";
                if(isset($_SESSION['id_user'])){
                    $MSSV = $_SESSION['id_user'];
                   
                }
                if(isset($_POST['namHoc'])){

                    $namHoc = substr($_POST['namHoc'], 0, 4);
                    $test =  trim($_POST['namHoc']);
                     $kyHoc = substr($test, -1);

                 
            

                }
                $sql = "select A.*,C.tenMonHoc FROM LopHocPhan A 
                Left join ThamGiaHoc B ON(A.maLopHocPhan = B.maLopHocPhan) 
                Left join MonHoc C ON(A.maMonHoc = C.maMonHoc) 
                where B.maSinhVien =  ".$MSSV." and A.namHoc = ".$namHoc." and A.hocKy = ".$kyHoc ;
               
              

                $stmt2 = sqlsrv_query($this->conn, $sql);
                if ($stmt2 === false) {
                    echo "Error in executing query.</br>";
                    die(print_r(sqlsrv_errors(), true));
                        } else {
                            echo ' <table Class="">
                            <head>
                                <th>Mã môn</th>
                                <th>Tên môn</th>
                                <th>Thứ</th>
                                <th>Giờ lên lớp</th>
                                <th>Thời gian của học </th>

                               

                            </head>
                            <tbody>';
                            while ($std = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
                echo ' <tr>
                               
                                
                                
                                <td value="">' . $std['maMonHoc'] . '</td>
                                <td value="">' . $std['tenMonHoc'] . '</td>
                                <td value="' . $std['day'] . '">' . $std['day'] . '</td>
                                <td value="">' . date_format($std['startTime'], " H:i") . '
                                -' . date_format($std['endTime'], " H:i") . '</td>
                                <td value="">' . date_format($std['startDate'], "d/m/Y") . '
                                -' . date_format($std['endDate'], "d/m/Y") . '</td></tr>';
                
                            }

                             echo ' </tbody> </table>';
                        }
                    }
                    public function showHocPhi(){
                        $MSSV = "";
                        if(isset($_SESSION['id_user'])){
                            $MSSV = $_SESSION['id_user'];
                           
                        }
                        if(isset($_POST['namHoc'])){
        
                            $namHoc = substr($_POST['namHoc'], 0, 4);
                            $test =  trim($_POST['namHoc']);
                             $kyHoc = substr($test, -1);
        
                         
                    
        
                        }
                        $sql = "select A.*, C.soTinChi,C.tenMonHoc, C.soTinChi FROM LopHocPhan A 
                        Left join ThamGiaHoc B ON(A.maLopHocPhan = B.maLopHocPhan) 
                        Left join MonHoc C ON(C.maMonHoc = A.maMonHoc) 
                        where B.maSinhVien =  ".$MSSV." and A.namHoc = ".$namHoc." and A.hocKy = ".$kyHoc ;
                       
                      
        
                        $stmt2 = sqlsrv_query($this->conn, $sql);
                        if ($stmt2 === false) {
                            echo "Error in executing query.</br>";
                            die(print_r(sqlsrv_errors(), true));
                                } else {
                                    echo ' <table Class="">
                                    <head>
                                        <th>Mã môn hoc</th>
                                        <th>Tên môn học</th>
                                        <th>số tín chỉ</th>
          
                                    </head>
                                    <tbody>';
                                    $tong = 0;
                                    while ($std = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
                                        
                                        $tong = $tong + $std['soTinChi'];
                                        
                        echo ' <tr>                                   
                                        <td value="">' . $std['maMonHoc'] . '</td>
                                        <td value="">' . $std['tenMonHoc'] . '</td>
                                        <td value="">' . $std['soTinChi'] . '</td>

                                      </tr>';
                        
                                    }

                                    echo '<tr>
                                        <td></td>
                                        <td>Tổng số tiền:</td>
                                        <td>'.($tong*990000).'</td>
                                    </tr>';
                                     echo ' </tbody> </table>';
                                }
                            }
}

?>