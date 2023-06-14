<?php

class loginModel extends DB
{

    function check_User()
    {

        $test = false;
        // $result =[];
        if (isset($_POST)) {
            if (isset($_POST['fullname'])) {
                $s_fullname = $_POST['fullname'];
            }

            if (isset($_POST['password'])) {
                $s_password = $_POST['password'];
            }


            $s_fullname = str_replace('\'', '\\\'', $s_fullname);
            $s_password = str_replace('\'', '\\\'', $s_password);
           

        }
        $tsql = "SELECT * FROM userManagement where 
                userName = '" . $s_fullname . "' and passWord = '" . $s_password ."'";


        $stmt = sqlsrv_query($this->conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
        if ($stmt === false) {
            echo "Error in executing query.</br>";
            die(print_r(sqlsrv_errors(), true));

        } else {

        //     while( $result = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        //          print_r( $result);
        //     }
       
            return $stmt;
        }
       
    }
    



 
}
?>