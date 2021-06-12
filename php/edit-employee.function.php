<?php
    function editEmployee($id, $code,$name, $type){
        session_start();
        if($_SESSION["user"]["type"]!="ADMIN") return false;
        foreach(array($id,$code,$name,$type) as $field)
            if(!isset($field)) return false;

        require("../database/connection.php");

        $query = "update employee e set e.code=$code, e.name=$name, e.type=$type where e.id=$id";

        if($result = $connection->query($query)){
            return true;
        }
        $connection->close();
        return false;
    }

?>