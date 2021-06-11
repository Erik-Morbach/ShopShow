<?php 
    function login($inputPassCode){    
        if(!isset($inputPassCode)) return false;

        require("../database/connection.php");

        $query = sprintf("select * from employee e where e.code like \"%s\"",$inputPassCode);

        if($result = $connection->query($query)){
            $response = $result->fetch_assoc();

            if(!isset($_SESSION)) session_start();

            $_SESSION["user"]["code"] = $response["code"];
            $_SESSION["user"]["name"] = $response["name"];
            $_SESSION["user"]["type"] = $response["type"];

            return true;
        }
        $connection->close();
        return false;
    }
?>
