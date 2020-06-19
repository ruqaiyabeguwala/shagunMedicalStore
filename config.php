<?php
class connection{
    
    
    function connect()
    {
        $server='localhost';
        $user='root';
        $pass='';
        $db='shagun_medical';
        $con= new mysqli($server,$user,$pass,$db);
        return $con;    
    }
}



?>