<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <title>Login</title>
</head>

<header>
    <nav class="menu">
        <a href="register-employee.php" class="item-menu">FUNCIONARIOS</a>
        <a href="search-product.php" class="item-menu">PROCURAR</a>
        <a href="register-product.php" class="item-menu">PRODUTOS</a>
        <a href="exit.php" class="item-menu">SAIR</a>
    </nav>
</header>

<body>
    <?php 
        include_once("../php/test-access.function.php");
        test_access_permissions(array("ADMIN","STOCK","SALES"));
    ?> 
    <div class="container">

        <div class="box-title">

            <h1 class="title"> Procurar produto </h1>
            
            <form class="form" action="search-product.php" method="POST">

                <input 
                class="input" 
                type="text"
                name="description"
                placeholder="Nome do produto"
                />
                <input type="submit" name="submit"/>

                <?php
                    session_start();
                    include_once("../php/search-product.function.php");
                    if(isset($_POST["submit"])){
                        $error = !search_product($_POST["description"]);


                        if($error){
                            echo "<span>";
                            echo "Erro ao buscar produto";
                            echo "<span>";
                        }
                        else{
                            foreach($_SESSION["product"]["search"] as $product){
                                echo sprintf("<br>%d %s %lf<br>",$product["id"],$product["description"],$product["price"]);
                            }
                        }
                    }
                    $_POST = array();
                ?>

            </form>

        </div>

    </div>

</body>

</html>