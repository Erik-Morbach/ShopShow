<?php
    function search_product($description){
        session_start();
        if(!isset($description)) return false;

        require("../database/connection.php");
        
        $inputProductDescription = $_POST["description"];

        $query = "select * from product p where p.description like lower(\"%$inputProductDescription%\")";
        if($result = $connection->query($query)){
            $response = $result->fetch_all(MYSQLI_ASSOC);
            $_SESSION["product"]["search"] = $response; 
            return true;
        }
        $connection->close();
        return false;
    }
    ?>
