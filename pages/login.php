<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/login-screen.css">
    <title>Login</title>
</head>

<body>
    
    <div class="container">

        <div class="box-title">

            <h1 class="title"> Login </h1>
            <h3 class="sub-title"> Bom ter você como funcionário! </h3>
            
            <form class="form" action="login.php" method="POST">
                <input class="input" name="code" type="text" placeholder="Insira seu código"/>
                <button type="submit">
                    Logar
                </button>
                <?php
                    include_once("../php/login.function.php");
                    
                    if(isset($_POST['code'])) {

                        
                        $error = !login($_POST['code']);
                        $_POST['code']=null;

                        if($error) {
                            echo "<span>";
                            echo "Não foi possível encontrar seu usuário";
                            echo "</span>";    
                        } else {
                            switch($_SESSION["user"]["type"]) {
                                case "ADMIN": 
                                    header('location: ./register-employee.php');
                                    break;
                                case "SEARCH":
                                    header('location: ./search-product.php');
                                    break;
                                case "STOCK":
                                    header('location: ./register-product.php');
                                    break;
                            }
                        }
                    }
                    $_POST['code']=null;
                ?>
            </form>

            <span>Não registrado? peça para que um administrador te <b>cadastre!</b></span>
        </div>

    </div>

</body>

</html>
