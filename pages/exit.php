<!DOCTYPE html> 
<html lang="pt-br">
    <?php
        session_start();
        $_SESSION = array();
        header('location: ./login.php');
    ?>
</html>