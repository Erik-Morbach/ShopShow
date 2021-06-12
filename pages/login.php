<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/pages/login.css">
    <title>Login</title>
</head>

<body>
    
    <div class="container">

        <div class="box-title">

            <h1 class="title"> Login </h1>
            <h3 class="sub-title"> Bom ter você como funcionário! </h3>
            
            <form class="form" action="login.php" method="POST">
                <input class="input" name="code" type="text" maxlength="6" placeholder="Insira seu código"/>
                <button class="button-default" type="submit" name="submit">
                    Logar
                </button>
                <?php
                    session_start();
                    include_once("../php/login.function.php");
                    
                    if(isset($_POST['submit'])) {
                        
                        $error = !login($_POST['code']);

                        if($error) {
                            echo "<span>";
                            echo "Não foi possível encontrar seu usuário";
                            echo "</span>";    
                        } else {
                            switch($_SESSION["user"]["type"]) {
                                case "ADMIN": 
                                    header('location: ./employee.php');
                                    break;
                                case "SALES":
                                    header('location: ./search-product.php');
                                    break;
                                case "STOCK":
                                    header('location: ./product.php');
                                    break;
                            }
                        }
                    }
                    $_POST=array();
                ?>
            </form>

            <span>Não registrado? peça para que um administrador te <b>cadastre!</b></span>
        </div>

    </div>

</body>

</html>
