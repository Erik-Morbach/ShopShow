<html>
    <head>
    </head>

    <body>
        <div>
            <p> Login Query </p>

            <form action="index.php" method="POST">
                <input type="text" name="passCode">
                <input type="submit" name="submitButton" value="Enviar">

            </form>
            <p>
                <?php include("bd/login.php"); ?>
            </p>
        </div>


        <div>
            <p> Search Query</p>
            <form action="index.php" method="POST">
                <input type="text" name="productName">
                <input type="submit" name="submitButton" value="Enviar">
            </form>
            <p>
                <?php include("bd/search.php"); ?>
            </p>

        </div>

    </body>


</html>
