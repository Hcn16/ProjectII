<?php 
class GiaoVienModel extends DB{
    public function InsertGV()
    {
        $maGV ="";
        $diaChi = "";
        if (!empty($_POST)) {
           

            if (isset($_POST['fullname'])) {
                $fullname = $_POST['fullname'];
            }

            if (isset($_POST['khoa'])) {
                $khoa = $_POST['khoa'];
            }  

            if (isset($_POST['ngaySinh'])) {
                $ngaySinh = $_POST['ngaySinh'];
            }
                $t1sql = "get_maGV ";
                $stmt2 =  sqlsrv_query($this->conn, $t1sql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                
                 
                   
                while( $result = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) {                  
                            $maGV = $result['maNhanVien'];
                        }
                if($maGV!= 1)$maGV =  intVal( $maGV) +1;
                    
                
            

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
                $stmt =  sqlsrv_query($this->conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                
            
            while( $std = sqlsrv_fetch_array( $stmt)) {
                $diaChi = $std['wa'].'-'.$std['dis'].'-'.$std['pro'] ;
                            
                       
                    
                    
        }
           
                
   

            $avatar1 = $_FILES["avatar"]['name'];
            // var_dump($_FILES["avatar"]);
            // var_dump($_FILES["avatar"]['tmp_name']);
            move_uploaded_file($_FILES["avatar"]['tmp_name'], 'C:/xampp/htdocs/Project2_QLSinhvien/public/image/'.$_FILES["avatar"]['name']);

       
               
        }

       
      
        $date = date_create(".$ngaySinh.");
        $date1 = date_format( $date,"Y/m/d" );
        
        $fullname = ucwords ($fullname);
        $diaChi = ucwords($diaChi);
        $tsql1 = "InsertGV $maGV, N'$fullname', '$date1',$gioiTinh, $sdt, N'$diaChi',N'$khoa',N'$avatar1'";
        
        $stmt1 = sqlsrv_query($this->conn, $tsql1);
        if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
    }


    function ShowGV(){
       if(isset($_GET['maNhanVien'])){
       
        $sql = 'select * from NhanVien where maNhanVien = '.($_GET['maNhanVien']).'';
       }
        else if (isset($_POST['s']) && $_POST['s'] != '') {
           
            
            $sql = 'select * from NhanVien where maNhanVien = '.$_POST['s'].'';
        } else {
            $sql = 'select * from NhanVien';
        }
        
        $stmt2 = sqlsrv_query($this->conn,$sql);
        if ($stmt2 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt2;
        }
    }
    public function showGV_LHP(){
        if (isset($_POST['khoa'])) {
            $sql = 'select maNhanVien , hoTen from NhanVien where khoa = ' . $_POST['khoa'] . ' ';
        }
        else{
            echo "vào select ";
            $sql = 'select maNhanVien , hoTen, maKhoa from NhanVien ';
        }
        $stmt2 = sqlsrv_query($this->conn,$sql);
        if ($stmt2 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt2;
        }
}
function deleteGV(){
    $maGV = $_POST['maNhanVien'];
   
    $sql = "DELETE_NV $maGV";
    $stmt1 = sqlsrv_query($this->conn, $sql);
     if ($stmt1 === false) {
        echo "Error in executing query.</br>";
        die(print_r(sqlsrv_errors(), true));
    } else {
        return true;
    }
}

function CheckUpdateGV()
{
    $maGV = ($_GET['maGV']);
  
    $diaChi = "";
    if (!empty($_POST)) {
        if (isset($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }

        if (isset($_POST['ngaySinh'])) {
            $ngaySinh = $_POST['ngaySinh'];
        }

        
        if (isset($_POST['gioiTinh'])) {
            $gioiTinh = $_POST['gioiTinh'];
        }
        if (isset($_POST['sdt'])) {
            $sdt = $_POST['sdt'];
        }

        if (isset($_POST['khoa'])) {
            $makhoa = $_POST['khoa'];
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
        


        echo $fullname;
            echo $gioiTinh;
        $date = date_create(".$ngaySinh.");
        $date1 = date_format($date, "Y/m/d");

        $fullname = ucwords($fullname);
        $diaChi = ucwords($diaChi);
        $tsql1 = "update NhanVien set  hoTen =  N'$fullname', ngaySinh ='$date1', gioiTinh =N'$gioiTinh',
    Sdt= '$sdt', diaChi=N'$diaChi' , makhoa='$makhoa' where maNhanVien = $maGV";


        $stmt1 = sqlsrv_query($this->conn, $tsql1);
        if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
    }
}
    
}
    ?>