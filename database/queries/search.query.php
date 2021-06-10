<?php
    $response = NULL;
    if(isset($_POST["description"])){
        require("../connection.php");
        
        $inputProductDescription = $_POST["description"];

        $query = "select * from product p where p.description like lower(\"%$inputProductDescription%\")";
        if($result = $connection->query($query)){
            $response = $result->fetch_all(MYSQLI_ASSOC);
        }
        $connection->close();
    }
?>
