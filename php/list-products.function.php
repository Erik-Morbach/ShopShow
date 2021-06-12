<?php   
    function list_products(){
        session_start();

        require("../database/connection.php");

        $query = "select * from product";

        if($result = $connection->query($query)){
            $response = $result->fetch_all(MYSQLI_ASSOC);
            $_SESSION["product"]["list"] = $response; 
            return true;
        }
        $connection->close();
        return false;
    }
?>