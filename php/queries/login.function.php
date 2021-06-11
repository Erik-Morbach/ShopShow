<?php 
    function login($inputPassCode){    
        if(!isset($inputPassCode)) return false;
        require("../../database/connection.php");

        $query = sprintf("select * from employee e where e.code like \"%s\"",$inputPassCode);

        if($result = $connection->query($query)){
            $response = $result->fetch_assoc();

            if(!isset($_SESSION)) session_start();

            $_SESSION["userPassCode"] = $response["passCode"];
            $_SESSION["userName"]     = $response["name"];
            $_SESSION["userType"]     = $response["type"];

            return true;
        }
        $connection->close();
        return false;
    }
?>
