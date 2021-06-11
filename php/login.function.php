<?php 
    function login($inputPassCode){    
        session_start();

        if(!isset($inputPassCode)) return false;

        require("../database/connection.php");

        $query = sprintf("select * from employee e where e.code like \"%s\"",$inputPassCode);

        if($result = $connection->query($query)){
            $response = $result->fetch_assoc();

            $_SESSION["user"] = array();
            $_SESSION["user"]["code"] = $response["code"];
            $_SESSION["user"]["name"] = $response["name"];
            $_SESSION["user"]["type"] = $response["type"];

            return true;
        }
        $connection->close();
        return false;
    }
?>
