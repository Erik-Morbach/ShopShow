<?php
    function list_employees(){
        if(session_status()!=PHP_SESSION_ACTIVE) return false;

        require("../database/connection.php");

        $query = "select * from employee";
        if($result = $connection->query($query)){
            $response = $result->fetch_all(MYSQLI_ASSOC);
            $_SESSION["employees"] = $response; 
            return true;
        }
        $connection->close();
        return false;
    }
    ?>
