<?php
class ClassModel extends DB{
    public function InsertLop()
    {
       
        if (!empty($_POST)) {
           
            $maMonHoc = "";
            $giaoVien = "";
            if(!empty($_POST)){

           
            if (isset($_POST['monHoc'])) {
                $maMonHoc = $_POST['monHoc'];
               
            }

            if (isset($_POST['namHoc'])) {
                $namHoc = $_POST['namHoc'];
            }

            if (isset($_POST['hocKi'])) {
                $hocKi = $_POST['hocKi'];
              
                
                    }
            if (isset($_POST['giaoVien'])) {
                $giaoVien = $_POST['giaoVien'];
               
              
            }
            if (isset($_POST['language'])) {
                $language = $_POST['language'];
            }
            if (isset($_POST['moTa'])) {
                $moTa = $_POST['moTa'];
           }
            if (isset($_POST['maxSV'])) {
                $maxSV = $_POST['maxSV'];
            } 
            
            if (isset($_POST['day'])) {
                $day = $_POST['day'];
                    }
            if (isset($_POST['startTime'])) {
                $startTime = $_POST['startTime'];
            }
            if (isset($_POST['endTime'])) {
                $endTime = $_POST['endTime'];
            }
            if (isset($_POST['startDate'])) {
                $startDate = $_POST['startDate'];
           }
            if (isset($_POST['endDate'])) {
                $endDate = $_POST['endDate'];
            } 
        }
        }


        $startDate1 = date_create(".$startDate.");
        $startDate2 = date_format( $startDate1,"Y/m/d" );


        $endDate1 = date_create(".$endDate.");
        $endDate2 = date_format( $endDate1,"Y/m/d" );
      
        
        $tsql1 = "insert into LopHocPhan (namHoc,hocKy,maMonHoc,maNhanVien,ngonNguGiangDay,moTa,maxSinhVien, day ,startDate, endDate,startTime, endTime) 
                                values($namHoc,$hocKi,N'$maMonHoc',N'$giaoVien',N'$language',N'$moTa',$maxSV, N'$day','$startDate2','$endDate2', '$startTime','$endTime') ";
        
        $stmt1 = sqlsrv_query($this->conn, $tsql1);
        if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
    }

    function ShowClass(){
        if(isset($_GET['maClass'])){       
         $sql = '	SELECT A.*, B.hoTen,A.maNhanVien,A.maMonHoc,C.tenMonHoc, B.Sdt
         FROM  LopHocPhan A left join NhanVien B  ON (A.maNhanVien=B.maNhanVien ) left join MonHoc C  ON (A.maMonHoc=C.maMonHoc ) where maLopHocPhan = '.($_GET['maClass']).'';
        }
         else if (isset($_POST['s']) && $_POST['s'] != '') {          
             $sql = '	SELECT A.*, B.hoTen,A.maNhanVien,A.maMonHoc,C.tenMonHoc, B.Sdt
             FROM  LopHocPhan A left join NhanVien B  ON (A.maNhanVien=B.maNhanVien ) left join MonHoc C  ON (A.maMonHoc=C.maMonHoc ) where maLopHocPhan = '.$_POST['s'].'';
         } else {
             $sql = '	SELECT A.*, B.hoTen,A.maNhanVien,A.maMonHoc,C.tenMonHoc, B.Sdt
             FROM  LopHocPhan A left join NhanVien B  ON (A.maNhanVien=B.maNhanVien ) 
             left join MonHoc C  ON (A.maMonHoc=C.maMonHoc )
             
             ';
         }
         
         $stmt2 = sqlsrv_query($this->conn,$sql);
         if ($stmt2 === false) {
             echo "Error in executing query.</br>";
             die(print_r(sqlsrv_errors(), true));
         } else {
             return $stmt2;
         }
     }

    function SL_SV_Class(){
        $sql2 = '	SELECT  A.maLopHocPhan, A.maSinhVien , B.hoTen 
             FROM  ThamGiaHoc A left join SinhVien B  ON (A.maSinhVien=B.maSinhVien ) ';
        
        $stmt = sqlsrv_query($this->conn, $sql2, array(), array( "Scrollable" => "buffered" ));
        
        if ($stmt === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt;
        }
    }

    function Class_Detail(){
        $_SESSION['id']= ($_GET['maLHP']);
        if(isset($_GET['maLHP'])){
        $sql2 = '	SELECT  A.*, B.hoTen 
             FROM  ThamGiaHoc A   left join SinhVien B ON (A.maSinhVien = B.maSinhVien)where maLopHocPhan = '.$_GET['maLHP'].' ';
        
        $stmt = sqlsrv_query($this->conn, $sql2, array(), array( "Scrollable" => "buffered" ));
        
        if ($stmt === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt;
        }
    }
    }
    function DeleteLHP(){
        if(isset($_GET['maLHP'])){
            $sql2 = 'Delete_LHP '.$_GET['maLHP'].' ';       
            $stmt = sqlsrv_query($this->conn, $sql2, array(), array( "Scrollable" => "buffered" ));       
            if ($stmt === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
            } else {
            return true;
            }
        }
        
    }

    function check_updateLHP(){
        if (!empty($_POST)) {
           
            $maMonHoc = "";
            $giaoVien = "";
            if(!empty($_POST)){

            if (isset($_POST['namHoc'])) {
                $namHoc = $_POST['namHoc'];
            }

            if (isset($_POST['hocKi'])) {
                $hocKi = $_POST['hocKi'];
                    }
            if (isset($_POST['giaoVien'])) {
                $giaoVien = $_POST['giaoVien'];              
            }
            if (isset($_POST['language'])) {
                $language = $_POST['language'];
            }
            if (isset($_POST['moTa'])) {
                $moTa = $_POST['moTa'];
           }
            if (isset($_POST['maxSV'])) {
                $maxSV = $_POST['maxSV'];
            } 
            
            if (isset($_POST['day'])) {
                $day = $_POST['day'];
                    }
            if (isset($_POST['startTime'])) {
                $startTime = $_POST['startTime'];
            }
            if (isset($_POST['endTime'])) {
                $endTime = $_POST['endTime'];
            }
            if (isset($_POST['startDate'])) {
                $startDate = $_POST['startDate'];
           }
            if (isset($_POST['endDate'])) {
                $endDate = $_POST['endDate'];
            } 
        }
        }
        else{
            echo " vào đay test";
        }


        $startDate1 = date_create(".$startDate.");
        $startDate2 = date_format( $startDate1,"Y/m/d" );


        $endDate1 = date_create(".$endDate.");
        $endDate2 = date_format( $endDate1,"Y/m/d" );
        echo $_GET['maClass'];
        if(isset($_GET['maClass'])){
            $maLHP = $_GET['maClass'];
            $sql2 = "update LopHocPhan set namHoc = '$namHoc',hocKy='$hocKi'
            ,maNhanVien='$giaoVien',ngonNguGiangDay='$language',moTa=N'$moTa',maxSinhVien='$maxSV', 
            day='$day',startDate='$startDate2', endDate ='$endDate2', startTime = '$startTime', endTime = '$endTime'
            where maLopHocPhan = $maLHP ";
            echo $sql2;     
            $stmt = sqlsrv_query($this->conn, $sql2, array(), array( "Scrollable" => "buffered" ));       
            if ($stmt === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
            } else {
            return true;
            }
        }
    }// update LHP;


    function showNamHoc(){
        $MSSV = "";
        if(isset($_SESSION['id_user'])){
            $MSSV = $_SESSION['id_user'];
           
        }
        $sql2 = "select distinct A.namHoc, A.hocKy FROM LopHocPhan A 
        Left join ThamGiaHoc B ON(A.maLopHocPhan = B.maLopHocPhan) where B.maSinhVien =  ".$MSSV;
            
            $stmt = sqlsrv_query($this->conn, $sql2, array(), array( "Scrollable" => "buffered" ));       
            if ($stmt === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
            } else {
            return $stmt;
            }
    }
}

?>