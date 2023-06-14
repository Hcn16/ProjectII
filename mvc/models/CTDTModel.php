<?php
class SinhVienModel extends DB
{
    public function GetSV()
    {
        //connection DB

        return "Nguyen van a ";

    }

    //lấy dữ liệu bảng CTDT
    public function getCTDT()
    {

        $tsql = "SELECT * FROM ChuongTrinhDaoTao";
        $stmt = sqlsrv_query($this->conn, $tsql);
        if ($stmt === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt;
        }



    }
    public function insertCTDT(){
        $tsql = "INSERT INTO ChuongTrinhDaoTao (maCTDT,tenCTDT, soTinChi,namBatDauDaoTao) 
        VALUES (?,'Cơ khí', 150, '2000');";
        $stmt = sqlsrv_query($this->conn, $tsql);
        if ($stmt === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $stmt;
        }
    }


}

?>