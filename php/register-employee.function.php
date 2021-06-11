<?php
    function registerEmployee($passCode, $name, $type){
        if($_SESSION["user"]["type"]!="ADMIN") return false; 
        foreach(array($passCode,$name,$type) as $field){
            if(!isset($field)) return false;
        }

        require("../database/connection.php");
        $query = sprintf("insert into employee value(NULL,%s,%s,%s)",
                        $passCode,$name,$type);
        
        if($result = $connection->query($query)){
            return true;
        }
        $connection->close();
        return false;
    }
?>
