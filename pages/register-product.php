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

            <h1 class="title"> Cadastro produto </h1>
            
            <form class="form" action="register-product.php" method="POST">

                <input 
                class="input" 
                type="text"
                name="description"
                placeholder="Descricao do Produto"
                />

                <input 
                class="input" 
                type="text"
                name="price"
                placeholder="Preço do Produto"
                />

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

        </div>

    </div>

</body>

</html>