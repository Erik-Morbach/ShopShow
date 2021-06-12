<?php   
    function test_access_permissions($wantedPermissions){
        session_start();
        foreach($wantedPermissions as $category){
            if($_SESSION["user"]["type"]==$category) return;
        }
        die("Acesso Não Permitido!");
    }
?>