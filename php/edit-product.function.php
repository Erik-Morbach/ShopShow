<?php
    function editProduct($id, $description,$price){
        if($_SESSION["user"]["type"]=="SEARCH") return false;
        foreach(array($id,$description,$price) as $field)
            if(!isset($field)) return false;

        require("../database/connection.php");

        $query = "update product p set p.description=$description, p.price=$price where p.id=$id";

        if($result = $connection->query($query)){
            return true;
        }
        $connection->close();
        return false;
    }

?>