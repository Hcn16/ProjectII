<?php 
class QuiDinhModel extends DB{

   
    public function showQD_DH(){
        $QD = "DH";
        if (isset($_GET['QD'])) {

            $QD = $_GET['QD'];
         


            $sql = "select * from QuiDinh where loai = '$QD'  order by date DESC";
        }
        else{
            $sql = "select * from QuiDinh  order by date DESC";
        }
            $stmt2 = sqlsrv_query($this->conn,$sql);
            if ($stmt2 === false) {
                echo "Error in executing query.</br>";
                die(print_r(sqlsrv_errors(), true));
            } else {
                return $stmt2;
            }
        
    }
    public function showTB_loai(){
        $TB = "DH";
        if (isset($_GET['TB'])) {

            $TB = $_GET['TB'];
           


            $sql = "select * from ThongBao where loai = '$TB'  order by date DESC";
        }
        else{
            $sql = "select * from ThongBao  order by date DESC";
        }
            $stmt2 = sqlsrv_query($this->conn,$sql);
            if ($stmt2 === false) {
                echo "Error in executing query.</br>";
                die(print_r(sqlsrv_errors(), true));
            } else {
                return $stmt2;
            }
        
    }

    public function showTT(){
        $tag = "QuiDinh";
        if(isset($_GET['TT'])) $tag = $_GET['TT'];
        if(isset($_POST['TT'])) $tag = $_POST['TT'];
        if(($tag == "QuiDinh") ) {
                $TT = "QuiDinh";


                $sql = "select * from    " . $TT." order by date DESC";


                $stmt2 = sqlsrv_query($this->conn, $sql);

                if ($stmt2 === false) {
                    echo "Error in executing query.</br>";
                    die(print_r(sqlsrv_errors(), true));
                } else {
                    return $stmt2;
                }
            }
        
        
    }

    public function showTB(){
        $tag = "ThongBao";
        if(isset($_GET['TT'])) $tag = $_GET['TT'];
        if(isset($_POST['TT'])) $tag = $_POST['TT'];
        if(($tag == "ThongBao") ) {
                $TT = "ThongBao";


                $sql = "select * from    " . $TT." order by date DESC";


                $stmt2 = sqlsrv_query($this->conn, $sql);

                if ($stmt2 === false) {
                    echo "Error in executing query.</br>";
                    die(print_r(sqlsrv_errors(), true));
                } else {
                    return $stmt2;
                }
            }
        
        
    }

    public function showLH(){
        $tag = "LienHe";
        if(isset($_GET['TT'])) $tag = $_GET['TT'];
        if(isset($_POST['TT'])) $tag = $_POST['TT'];
       
       
            if(($tag == "LienHe") ) {
                $TT = "LienHe";
           
                $sql = "select * from    " . $TT;
            
                $stmt2 = sqlsrv_query($this->conn, $sql);
                if ($stmt2 === false) {
                echo "Error in executing query.</br>";
                die(print_r(sqlsrv_errors(), true));
                } else {
                return $stmt2;
                }
        }
    
        
    }

    public function InsertTB()
    {
        
        if (!empty($_POST)) {
           

            if (isset($_POST['content'])) {
                $content = $_POST['content'];
            }

            if (isset($_POST['Loai'])) {
                $Loai = $_POST['Loai'];
            }  

            
           
        }

       
      
        $date = date_create();
        $date1 = date_format( $date,"Y/m/d" );     
        $tsql1 = "Insert into ThongBao (content, loai, date) values (N'$content', '$Loai', '$date1')";
        $stmt1 = sqlsrv_query($this->conn, $tsql1);
        if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
     
    }
    //////////////////////////////




    /////THêm qui định 
    public function InsertQD()
    {
        
        if (!empty($_POST)) {
           

            if (isset($_POST['content'])) {
                $content = $_POST['content'];
            }

            if (isset($_POST['Loai'])) {
                $Loai = $_POST['Loai'];
            }           
           
        }
        $date = date_create();
        $date1 = date_format( $date,"Y/m/d" );     
        $tsql2 = "Insert into QuiDinh (content, loai, date) values (N'$content', '$Loai', '$date1')";
        
        $stmt1 = sqlsrv_query($this->conn, $tsql2);
        if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
    }

  
     /////////////////////////////
    public function UpdateQD()
    {
        $maGV ="";
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
            if (isset($_POST['diaChi'])) {
                $diaChi = $_POST['diaChi'];
           }
               
        }

       
      
        $date = date_create(".$ngaySinh.");
        $date1 = date_format( $date,"Y/m/d" );
        
        $fullname = ucwords ($fullname);
        $diaChi = ucwords($diaChi);
        $tsql1 = "InsertGV $maGV, N'$fullname', '$date1',$gioiTinh, $sdt, N'$diaChi',N'$khoa'";

        $stmt1 = sqlsrv_query($this->conn, $tsql1);
        if ($stmt1 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
    }


    //////////////Thêm liên hệ //////////////////////
    public function InsertLH()
    {
       
        if (!empty($_POST)) {          
            if (isset($_POST['host'])) {
                $host = $_POST['host'];
            }

            if (isset($_POST['Sdt'])) {
                $Sdt = $_POST['Sdt'];
            }  
            if (isset($_POST['diaChi'])) {
                $diaChi = $_POST['diaChi'];
            }  
            if (isset($_POST['Email'])) {
                $Email = $_POST['Email'];
            }           
           
        }
        
        $tsql2 = "insert into LienHe (host, diaChi, Sdt,email) values (N'$host', N'$diaChi', N'$Sdt',N'$Email')";
        $stmt2 = sqlsrv_query($this->conn, $tsql2);
        if ($stmt2 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
    }
    //////////////////////


    /////////////Xoá thông tin //////////////
    function deleteTT(){

        $TT = "LienHe";
        $id = "";
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        if (isset($_POST['TT'])) {
            $TT = $_POST['TT'];
        }


        $ts = "delete from ";
        $ts = $ts.$TT;
        $ts = $ts." where id = ";

        $tsql2 = $ts.$id ;
        $stmt2 = sqlsrv_query($this->conn, $tsql2);
        if ($stmt2 === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return true;
        }
    }

    ///////.......................//////////
}


?>