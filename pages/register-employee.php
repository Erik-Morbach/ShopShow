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

            <h1 class="title"> Cadastro funcionário </h1>
            
            <form class="form" action="register-employee.php" method="POST">

                <input 
                class="input" 
                type="text"
                name="name"
                placeholder="Nome do funcionário"
                />

                <input 
                class="input" 
                type="text"
                name="code"
                placeholder="Código do funcionário"
                maxlength="6"
                />

                <select 
                name="type" 
                id=""
                class="select" 
                >
                <option value="" disabled selected hidden >Selecione o cargo do funcionario</option>
                <option value="ADMIN">Administrador</option>
                <option value="SALES">Vendedor</option>
                <option value="STOCK">Gerente de estoque</option>

                </select>

                <input type="submit" name="submit">
                </input>                

                <?php
                    session_start();
                    include_once("../php/register-employee.function.php");

                    if(isset($_POST["submit"])){
                        $error = !registerEmployee($_POST["code"],$_POST["name"],$_POST["type"]);
                        echo "<span>";
                        if($error)
                            echo "Não foi possivel cadastrar novo funcionário, verifique os dados digitados";
                        else 
                            echo "Funcionário cadastrado com sucesso";
                        echo "<span>";
                        
                    } 
                    $_POST = array();

                ?>
            </form>



        </div>

    </div>

</body>

</html>
