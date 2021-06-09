<?php 
    $response = NULL;
    if(isset($_POST["passCode"])){

        require("connection.php");

        $inputPassCode = $_POST["passCode"];


        $query = "select * from employee e where e.passCode like \"$inputPassCode\"";

        if($result = $connection->query($query)){
            $response = $result->fetch_assoc();
        }
        $connection->close();
    }

    if(isset($response)){
        printf("Id %d | passCode %s | Name %s<br>\n",$response["employeeId"],$response["passCode"],$response["name"]);
    } 
?>
