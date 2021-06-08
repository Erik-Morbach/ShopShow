<?php
    $serverName = "localhost";
    $user     = "root";
    $password = "root";
    $databaseName = "shopShow";

    $connection = new mysqli($serverName,$user,$password,$databaseName);
    if(!$connection){
        die("Connection Failure");
    }
?>
