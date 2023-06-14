<?php
class SinhVienModel extends DB
{
    
    //lấy dữ liệu bảng CTDT
    public function getSV()
    {

        $tsql = "SELECT * FROM SinhVien";
        $stmt = sqlsrv_query($this->conn, $tsql);
        if ($stmt === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt;
        }



    }
    public function InsertSV()
    {
        $maSV ="";
        $diaChi = "";
        if (!empty($_POST)) {
            if (isset($_POST['fullname'])) {
                $fullname = $_POST['fullname'];
            }

            if (isset($_POST['ngaySinh'])) {
                $ngaySinh = $_POST['ngaySinh'];
            }

            if (isset($_POST['namNH'])) {
                $namNH = $_POST['namNH'];
              
                $t1sql = "get_MSSV_K N'$namNH'";
                $stmt2 =  sqlsrv_query($this->conn, $t1sql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));   
                while( $result = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) {                  
                            $maSV = $result['maSinhVien'];
                        }
                if($maSV!= 1)$maSV =  intVal( $maSV) +1;
                    
                if($maSV == 1){
                    $maSV2 = intVal($namNH) - 1955;
                    $maSV = (string)($maSV2)."0001";
                 }
            }

            if (isset($_POST['gioiTinh'])) {
                $gioiTinh = $_POST['gioiTinh'];
            }
            if (isset($_POST['sdt'])) {
                $sdt = $_POST['sdt'];
            }
            if (isset($_POST['province2'])) {
                $province = $_POST['province2'];
           }
           if (isset($_POST['district2'])) {
            $district = $_POST['district2'];
       }
       if (isset($_POST['ward2'])) {
        $ward = $_POST['ward2'];
               
   }
                $tsql = "getAddress N'$province', N'$district', N'$ward'";  
                $stmt =  sqlsrv_query($this->conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                
            
            while( $std = sqlsrv_fetch_array( $stmt)) {
                $diaChi = $std['wa'].'-'.$std['dis'].'-'.$std['pro'] ;
                            
                       
                    
                    
        }
            if (isset($_POST['CTDT'])) {
                $maCTDT = $_POST['CTDT'];
            } 
            $avatar1 = $_FILES["avatar2"]['name'];
            // var_dump($_FILES["avatar"]);
            // var_dump($_FILES["avatar"]['tmp_name']);
            move_uploaded_file($_FILES["avatar2"]['tmp_name'], 'C:/xampp/htdocs/Project2_QLSinhvien/public/image/'.$_FILES["avatar2"]['name']);


        }

       
      
        $date = date_create(".$ngaySinh.");
        $date1 = date_format( $date,"Y/m/d" );
        
        $fullname = ucwords ($fullname);
        $diaChi = ucwords($diaChi);
        $tsql1 = "InsertSinhVien $maSV, N'$fullname', '$date1', $namNH, $gioiTinh, $sdt, N'$diaChi',$maCTDT, N'$avatar1'";

        $stmt1 = sqlsrv_query($this->conn, $tsql1);
        if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
    }


    function ShowSinhVien(){
       if(isset($_GET['MSSV'])){
       
        $sql = 'select * from SinhVien where maSinhVien = '.($_GET['MSSV']).'';
       }
        else if (isset($_POST['s']) && $_POST['s'] != '') {
           
            
            $sql = 'select * from SinhVien where maSinhVien = '.$_POST['s'].'';
        } else {
            $sql = 'select * from SinhVien';
        }
        
        $stmt2 = sqlsrv_query($this->conn,$sql);
        if ($stmt2 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt2;
        }
    }

    function ShowSinhVien_K(){
       
        if (isset($_POST['K']) && $_POST['K'] != '') {
           
            
            $sql = 'select * from SinhVien where namNhapHoc = '.$_POST['K'].'';
        } else {
            $sql = 'select * from SinhVien';
        }
        
        $stmt2 = sqlsrv_query($this->conn,$sql);
        if ($stmt2 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt2;
        }
    }
    function ShowSV(){
        $sql = 'select * from SinhVien where maSinhVien = '.$_SESSION['id_user'].'';
        $stmt2 = sqlsrv_query($this->conn,$sql);
        if ($stmt2 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt2;
        }
    }

    function CheckUpdateSV()
    {
        $maSV = ($_GET['MSSV']);
       
        $diaChi = "";
        if (!empty($_POST)) {
            if (isset($_POST['fullname'])) {
                $fullname = $_POST['fullname'];
            }

            if (isset($_POST['ngaySinh'])) {
                $ngaySinh = $_POST['ngaySinh'];
            }

            if (isset($_POST['namNH'])) {
                $namNH = $_POST['namNH'];
            }
            if (isset($_POST['gioiTinh'])) {
                $gioiTinh = $_POST['gioiTinh'];
            }
            if (isset($_POST['sdt'])) {
                $sdt = $_POST['sdt'];
            }
            if (isset($_POST['province'])) {
                $province = $_POST['province'];
            }
            if (isset($_POST['district'])) {
                $district = $_POST['district'];
            }
            if (isset($_POST['ward'])) {
                $ward = $_POST['ward'];

            }
            $tsql = "getAddress N'$province', N'$district', N'$ward'";
            $stmt = sqlsrv_query($this->conn, $tsql, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET));


            while ($std = sqlsrv_fetch_array($stmt)) {
                $diaChi = $std['wa'] . '-' . $std['dis'] . '-' . $std['pro'];

            }
            if (isset($_POST['CTDT'])) {
                $maCTDT = $_POST['CTDT'];
            }


          
            $date = date_create(".$ngaySinh.");
            $date1 = date_format($date, "Y/m/d");

            $fullname = ucwords($fullname);
            $diaChi = ucwords($diaChi);
            $tsql1 = "update SinhVien set  hoTen =  N'$fullname', ngaySinh ='$date1', gioiTinh =N'$gioiTinh',namNhapHoc =N'$namNH',
        Sdt= '$sdt', diaChi=N'$diaChi',maCTDT='$maCTDT' where maSinhVien = $maSV";


            $stmt1 = sqlsrv_query($this->conn, $tsql1);
            if ($stmt1 === false) {
                echo "Error in executing query.</br>";
                die(print_r(sqlsrv_errors(), true));
            } else {
                return true;
            }
        }
    }

    function Update_point_SV(){
        $maSV = ($_GET['maSV']);
        $maLHP = ($_GET['maLHP']);
        $QT = "";
        $CK = "";
        $vang = 0;
      
        if (!empty($_POST)) {
            if (isset($_POST['QT'])) {
                $QT = $_POST['QT'];
                
            }

            if (isset($_POST['CK'])) {
                $CK = $_POST['CK'];
            }

            if (isset($_POST['vang'])) {
                $vang = $_POST['vang'];
            }
           

              
        }

      
      
        $tsql1 = "update ThamGiaHoc set  QT =  '$QT', CK ='$CK', vang ='$vang'
        where maSinhVien = $maSV and maLopHocPhan= $maLHP";
        

        $stmt1 = sqlsrv_query($this->conn, $tsql1);
        if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }

    }

    function SV_register(){
        if(isset($_GET['maSV']) && isset($_GET['maLHP']) ){
            $maSV= $_GET['maSV'];
            $maLHP = $_GET['maLHP'];
        }
        $sql3 = "	SELECT A.startTime, A.startDate, A.endTime, A.endDate, A.day,A.soLuong , A.maLopHocPhan, A.maxSinhVien
        FROM  LopHocPhan A
        where A.maLopHocPhan = $maLHP ";       
        $stmt2 = sqlsrv_query($this->conn, $sql3);
        while ($std1 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
            $day_current = $std1['day'];
            $sTime_current = $std1['startTime'];
            $eTime_current = $std1['endTime'];
            $soLuong = $std1['soLuong'];
            $maxSV = $std1['maxSinhVien'];
            }

        


        $sql = "	SELECT A.startTime, A.startDate, A.endTime, A.endDate, A.day,  B.maSinhVien, A.maLopHocPhan
        FROM  ThamGiaHoc B left join LopHocPhan A  ON (B.maLopHocPhan=A.maLopHocPhan )                      
        where B.maSinhVien = $maSV ";


        $day = [];
        $startTime = [];
        $endTime=[];
        $maLop = [];
        $stmt1 = sqlsrv_query($this->conn, $sql);
        while ($std = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
            
            $sTime = date_format($std['startTime']," H:i");
            $eTime = date_format($std['endTime']," H:i");

            $day[] = $std['day'];
            $startTime[] = $sTime;
            $endTime[] = $eTime;
            $maLop[] = $std['maLopHocPhan'];
        }
        
        $check_rs = [];
        $sTime_current = date_format($sTime_current," H:i");
        $eTime_current = date_format($eTime_current," H:i");
        if($soLuong >= $maxSV){
           
            $check_rs[0] = "full";
            return $check_rs;
        }

      
        if(in_array($day_current,$day)){
            
            for ($i = 0; $i < count($day);$i++){
                if($sTime_current > $endTime[$i] || $eTime_current < $startTime[$i]){
                    
                   $tsql1 = "dk_hocTap '$maLHP','$maSV'";
                    $stmt1 = sqlsrv_query($this->conn, $tsql1);
                     if ($stmt1 === false) {
                         echo "Error in executing query.</br>";
                         die(print_r(sqlsrv_errors(), true));
                     } else {
                         return $check_rs;
                     } 
                }

                else{
                    if(($day_current == $day[$i])){
                        $check_rs[] = $maLop[$i];  
                    }
                    
                }
               

            }
            return $check_rs;
           
        }
        else{
           
             $tsql1 = "dk_hocTap '$maLHP','$maSV'";
            $stmt1 = sqlsrv_query($this->conn, $tsql1);
             if ($stmt1 === false) {
                 echo "Error in executing query.</br>";
                 die(print_r(sqlsrv_errors(), true));
             } else {
                 return $check_rs;
             }
            
        }
    

       
    }

    function showSV_class(){
        if(isset($_SESSION['id_user'])){
            $maSV = $_SESSION['id_user'];
        
            $sql = "	SELECT A.*, B.hoTen,A.maNhanVien,A.maMonHoc,C.tenMonHoc, B.Sdt, D.maSinhVien, C.soTinChi
            FROM  LopHocPhan A left join NhanVien B  ON (A.maNhanVien=B.maNhanVien ) 
                                left join MonHoc C  ON (A.maMonHoc=C.maMonHoc ) 
                                left join ThamGiaHoc D  ON (A.maLopHocPhan=D.maLopHocPhan ) 
                               
            where D.maSinhVien = $maSV ";
         $stmt1 = sqlsrv_query($this->conn, $sql);
         if ($stmt1 === false) {
             echo "Error in executing query.</br>";
             die(print_r(sqlsrv_errors(), true));
         } else {
             return $stmt1;
         }
        }
    }

    function showStudentProgram(){
        if (isset($_SESSION['id_user'])) {
            $maSV = $_SESSION['id_user'];

            $sql = "studentProgram $maSV ";
            $stmt1 = sqlsrv_query($this->conn, $sql);
            if ($stmt1 === false) {
                echo "Error in executing query.</br>";
                die(print_r(sqlsrv_errors(), true));
            } else {
                return $stmt1;
            }
        }
    }

    function showKQHT(){
        $maSV = $_SESSION['id_user'];
        $sql = "SELECT A.*,B.*,C.tenMonHoc
        FROM  LopHocPhan A left join ThamGiaHoc B  ON (A.maLopHocPhan=B.maLopHocPhan) 
        left join MonHoc C  ON (A.maMonHoc=C.maMonHoc )
        where maSinhVien = $maSV ";
        $stmt1 = sqlsrv_query($this->conn, $sql);
         if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt1;
        }

    }

    function deleteSV(){
        $maSV = $_POST['MSSV'];
        echo $maSV;
        $sql = "DELETE_SV $maSV";
        $stmt1 = sqlsrv_query($this->conn, $sql);
         if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
    }
    
    function EditPass(){
        $MSSV = "";
        if(isset($_GET['id'])){
            $MSSV = $_GET['id'];
        }
        $test = (int) $MSSV;
        
        

        if(isset($_POST['newPass'])){
            $newPass = $_POST['newPass'];
        }
        $sql = "update userManagement set passWord =  " . $newPass . " where maUser = " . $MSSV;
        $stmt1 = sqlsrv_query($this->conn, $sql);
        if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            if($test >100000){
                return 0;
            }
    
            if($test <100000 && $test >100){
                return 1;
            }
    
            if($test <100){
                return 2;
            }
        } 
    }

    function delete_dk_LHP()
    {
        $maLHP = $_GET['maLHP'];
     
        $mssv = $_SESSION['id_user'];
        $sql = "DELETE_SV_dk  '$mssv','$maLHP'";
        $stmt1 = sqlsrv_query($this->conn, $sql);
        if ($stmt1 === false) {
           echo "Error in executing query.</br>";
           die(print_r(sqlsrv_errors(), true));
       } else {
           return true;
       }
    }






}