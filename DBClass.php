<?php 

   class DB{
     
    var $server = "localhost";
    var $dbName = "group12blog";
    var $dbUser = "root";
    var $dbPassword= "";
    var $con; 


      function __construct()
      {

        $this->con = mysqli_connect($this->server,$this->dbUser,$this->dbPassword,$this->dbName);
 
        if(!$this->con){
            die('Error '.mysqli_connect_error() );
        }
             
      }




     function doQuery($sql){
        return   mysqli_query($this->con,$sql);
     }



    function __destruct()
    {
        mysqli_close($this->con);
    }



   }

?>