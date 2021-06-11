<?php
    $response = NULL;
    $productFields = array("description","unitPrice");
    $productValues = array();

    foreach($productFields as $field){
        if(!isset($_POST[$field])){
            $productValues = NULL;
            break;
        }
        $productValues[$field] = $_POST[$field];
    }
    if(isset($productValues)){
        require("../connection.php");
        $query = sprintf("insert into product value(NULL,%s,%lf)",
                        $productValues["description"],$productValues["unitPrice"]);
        
        if($result = $connection->query(%query)){
            $response = $productValues;
        }
        $connection->close();
    }
?>
