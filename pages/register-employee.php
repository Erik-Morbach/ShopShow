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
            
            <form class="form" action="">

                <input 
                class="input" 
                type="text"
                name="name"
                placeholder="Nome do funcionário"
                />

                <input 
                class="input" 
                type="text"
                name="passCode"
                placeholder="Código do funcionário"
                />

                <select 
                name="type" 
                id=""
                class="select" 
                >
                <option value="" disabled selected hidden >Selecione o cargo do funcionario</option>
                <option value="admin">1</option>
                <option value="searcher">2</option>
                <option value="stock">3</option>

                </select>


            </form>

        </div>

    </div>

</body>

</html>
