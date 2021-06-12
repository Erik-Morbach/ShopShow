<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/table.css">
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
            <h1 class="title">CADASTRO FUNCIONÁRIO</h1>
            <form class="form" action="register-employee.php" method="POST">   
                <input class="input" type="text" name="name" placeholder="Nome do funcionário" />
                <input class="input" type="text" name="code" placeholder="Código do funcionário" maxlength="6" />
                <select name="type" id="" class="select" >
                    <option value="" disabled selected hidden >Selecione o cargo do funcionario</option>
                    <option value="ADMIN">Administrador</option>
                    <option value="SALES">Vendedor</option>
                    <option value="STOCK">Estoque</option>
                </select>
                <input class="register" type="submit" name="register" value="CADASTRAR"/>               
                <?php
                    session_start();
                    include_once("../php/register-employee.function.php");
                    if(isset($_POST["register"])){
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

            <form method="POST" action="resgister-employee.php">
                <table class="table">
                    <tr>
                        <th>
                            IDENTIFICADOR
                        </th>
                        <th>
                            CÓDIGO
                        </th>
                        <th>
                            NOME
                        </th>
                        <th>
                            CARGO
                        </th>
                        <th>
                            <input class="save" type="submit" name="SAVE" value="SALVAR ALTERAÇÕES" />
                        </th>
                    </tr>
                    <?php
                        include_once('../php/list_employees.function.php');
                        include_once('../php/delete-employee.function.php');
                        function select_type_options() {
                            echo '
                                <option value="ADMIN">Administrador</option>
                                <option value="SALES">Vendedor</option>
                                <option value="STOCK">Estoque</option>
                            ';
                        }
                        function map_employees($employee) {
                            if($_POST["DELETE-".$employee["id"]]) {
                                delete_employee($employee["id"]);
                            } else {
                                echo "<tr>";
                                echo    "<td>";
                                echo        $employee["id"];
                                echo    "</td>";
                                echo    "<td>";
                                echo        '<input class="table-input" type="text" value="'.$employee["code"].'"/>';
                                echo    "</td>";
                                echo    "<td>";
                                echo        '<input class="table-input" type="text" value="'.$employee["name"].'"/>';
                                echo    "</td>";
                                echo    "<td>";
                                echo        '<select class="table-select" id="type" selected="'.$employee["type"].'">';
                                select_type_options();
                                echo        '</ select>';
                                echo    "</td>";
                                echo    "<td>";
                                echo        '<input name="DELETE-'.$employee["id"].'" type="submit" class="delete" value="DELETAR"/>';
                                echo    "</td>";
                            }
                        }
                        $found = list_employees();
                        if($found && sizeof($_SESSION["employees"]) > 0)
                            array_map("map_employees", $_SESSION["employees"]);
                    ?>
                <table>
            </form>
        </div>
    </div>

</body>

</html>
