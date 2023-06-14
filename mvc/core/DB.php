<?php
use FTP\Connection;
class DB {
    //SQL Server Connector
    /* Specify the server and connection string attributes. */

    public $conn;
    public $serverName = "ADMINISTRATOR";
    public $connectionInfo = array( "Database"=>"qlsinhvien","CharacterSet" => "UTF-8");

    function __construct(){
        /* Connect using Windows Authentication. */
    
    $this->conn = sqlsrv_connect( $this->serverName, $this->connectionInfo);
    
    
    if( $this->conn === false )
    {
        echo $this->serverName;
        echo "Unable to connect.</br>";
        die( print_r( sqlsrv_errors(), true));
    }
    }

    


}

?>