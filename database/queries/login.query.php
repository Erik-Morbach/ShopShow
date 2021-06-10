<?php 
    $response = NULL;
    if(isset($_POST["passCode"])){

        require("../connection.php");

        $inputPassCode = $_POST["passCode"];


        $query = sprintf("select * from employee e where e.passCode like \"%s\"",$inputPassCode);

        if($result = $connection->query($query)){
            $response = $result->fetch_assoc();
        }
        $connection->close();
    }
?>
