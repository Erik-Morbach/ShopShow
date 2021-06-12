<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/table.css">
    <title>Produtos</title>
</head>
<header>
    <nav class="menu">
        <a href="" class="item-menu">FUNCIONARIOS</a>
        <a href="" class="item-menu">PROCURAR</a>
        <a href="" class="item-menu">PRODUTOS</a>
        <a href="" class="item-menu">SAIR</a>
    </nav>
</header>
<body>  
    <div class="container">
        <div class="box-title">
            <h1 class="title"> CADASTRO PRODUTO </h1>
            <form class="form" action="product.php" method="POST">
                <input class="input" type="text" name="description" placeholder="Descricao do Produto"/>
                <input class="input" type="text" name="price" placeholder="Preço do Produto" />
                <input type="submit" name="submit">
                <?php
                    session_start();
                    include_once("../php/register-product.function.php");
                    if(isset($_POST["submit"])){
                        $error = !registerProduct($_POST["description"],$_POST["price"]);

                        echo "<span>";
                        if($error)
                            echo "Erro ao cadastrar produto";
                        else 
                            echo "Produto cadastrado com sucesso";
                        echo "<span>";
                    }
                    $_POST=array();
                ?>
            </form>
            <form method="POST" action="product.php">
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
                        <th>
                            <input class="save" type="submit" name="SAVE" value="SALVAR ALTERAÇÕES" />
                        </th>
                    </tr>
                </table>
                <?php
                        include_once('../php/list-product.function.php');
                        include_once('../php/delete-product.function.php');
                        function map_products($product) {
                            if($_POST["DELETE-".$product["id"]]) {
                                delete_employee($product["id"]);
                            } else {
                                echo "<tr>";
                                echo    "<td>";
                                echo        $product["id"];
                                echo    "</td>";
                                echo    "<td>";
                                echo        '<input class="table-input" type="text" value="'.$product["description"].'"/>';
                                echo    "</td>";
                                echo    "<td>";
                                echo        '<input class="table-input" type="number" min="50" value="'.$product["price"].'"/>';
                                echo    "</td>";
                                echo    "<td>";
                                echo        '<input name="DELETE-'.$product["id"].'" type="submit" class="delete" value="DELETAR"/>';
                                echo    "</td>";
                            }
                        }
                        $found = list_products();
                        if($found && sizeof($_SESSION["product"]["list"]) > 0)
                            array_map("map_products", $_SESSION["product"]["list"]);
                ?>
            </form>
        </div>
    </div>
</body>
</html>