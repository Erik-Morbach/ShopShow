<?php
    $serverName = "localhost";
    $user     = "root";
    $password = "";
    $databaseName = "shopShow";

    $connection = new mysqli($serverName,$user,$password,$databaseName);
    if(!$connection){
        die("Connection Failure");
    }
?>
