<?php
    function registerProduct($description,$price){
        if($_SESSION["user"]["type"]=="SEARCH") return false;

        foreach(array($description,$price) as $field)
            if(!isset($field)) return false;

        require("../database/connection.php");

        $query = sprintf("insert into product value(NULL,%s,%lf)",
                        $description,$price);
        
        if($result = $connection->query(%query)){
            return true;
        }
        $connection->close();
        return false;
    }
?>
