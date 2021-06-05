<?php 
    $response = "";
    if(isset($_POST["passCode"])){

        include_once("conection.php");

        $inputPassCode = $_POST["passCode"];

        $result = $connection->query("select * from employee e where e.passCode=$inputPassCode");
        $response = $result->fetch_assoc();

        $result->close();
        $connection->close();
    }
?>
