<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/table.css">
    <title>Buscar</title>
</head>

<header>
    <nav class="menu">
        <a href="employee.php" class="item-menu">FUNCIONARIOS</a>
        <a href="search-product.php" class="item-menu">PROCURAR</a>
        <a href="product.php" class="item-menu">PRODUTOS</a>
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
            <h1 class="title">PROCURAR PRODUTO</h1>
            <form class="form" action="search-product.php" method="POST">
                <input class="input" type="text" name="description" placeholder="Nome do produto" />
                <input class="button-default" type="submit" name="submit"/>
                <table class="table">
                    <tr>
                        <th>
                            IDENTIFICADOR
                        </th>
                        <th>
                            DESCRIÇÃO
                        </th>
                        <th>
                            PREÇO
                        </th>
                    </tr>
                <?php
                    session_start();
                    include_once('../php/search-product.function.php');

                    function map_products($product) {
                        echo "<tr>";
                        echo    "<td>";
                        echo        $product["id"];
                        echo    "</td>";
                        echo    "<td>";
                        echo        $product["description"];
                        echo    "</td>";
                        echo    "<td>";
                        echo        $product["price"];
                        echo    "</td>";
                    }

                    if(isset($_POST["submit"])){
                        $error = !search_product($_POST["description"]);

                        if($error){
                            echo "<span>";
                            echo "Erro ao buscar produto";
                            echo "<span>";
                        }
                    
                        if(!$error && sizeof($_SESSION["product"]["search"]) > 0)
                            array_map("map_products", $_SESSION["product"]["search"]);
                    }
                    $_POST = array();
                ?>
                </table>
            </form>
        </div>

    </div>

</body>

</html>