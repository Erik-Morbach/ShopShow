<?php
    $response = NULL;
    if(isset($_POST["productName"])){
        require("../connection.php");
        
        $inputProductName = $_POST["productName"];

        $query = "select * from product p where p.description like lower(\"%$inputProductName%\")";
        if($result = $connection->query($query)){
            $response = $result->fetch_all(MYSQLI_ASSOC);
        }
        $connection->close();
    }
    if(isset($response)){
        foreach($response as $row){
            printf("Id %d | Description %s | Price %.2lf<br>",$row["productId"], $row["description"], $row["unitPrice"]);    
        }
    }
?>
