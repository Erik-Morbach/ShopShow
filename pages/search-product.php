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
        <a href="" class="item-menu">FUNCIONARIOS</a>
        <a href="" class="item-menu">PROCURAR</a>
        <a href="" class="item-menu">PRODUTOS</a>
        <a href="" class="item-menu">SAIR</a>
    </nav>
</header>

<body>
    
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
                    include_once("../php/search.function.php");
                    if(isset($_POST["submit"])){
                        $error = !search($_POST["description"]);


                        if($error){
                            echo "<pan>";
                            echo "Erro ao buscar produto";
                            echo "<pan>";
                        }
                        else{
                            foreach($_SESSION["productList"] as $product){
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