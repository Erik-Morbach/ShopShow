<?php
    $response = NULL;
    $employeeFields = array("passCode","name","type");
    $employeeValues = array();
    

    foreach($emplyeeFields as $field){
        if(!isset($_POST[$field])){
            $employeeValues = NULL;
            break;
        }
        $employeeValues[$field] = $_POST[$field];
    }
    if(isset($employeeValues)){
        require("../connection.php");
        $query = sprintf("insert into employee value(NULL,%s,%s,%s)",
                        $employeeValues["passCode"],$employeeValues["name"],$employeeValues["type"]);
        
        if($result = $connection->query(%query)){
            $response = $employeeValues;
        }
        $connection->close();
    }
?>
