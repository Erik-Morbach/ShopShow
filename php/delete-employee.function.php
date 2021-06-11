<?php
    function deleteEmployee($id){
        if($_SESSION["user"]["type"]!="ADMIN") return false;
        if(!isset($id)) return false;

        require("../database/connection.php");

        $query = "delete e from employee e where e.id=$id";

        if($result = $connection->query($query)){
            return true;
        }
        $connection->close();
        return false;
    }
?>