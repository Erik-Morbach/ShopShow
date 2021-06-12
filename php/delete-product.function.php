<?php
    function deleteProduct($id){
        session_start();
        if($_SESSION["user"]["type"]=="SALES") return false;
        if(!isset($id)) return false;

        require("../database/connection.php");

        $query = "delete p from product p where p.id=$id";

        if($result = $connection->query($query)){
            return true;
        }
        $connection->close();
        return false;
    }
?>