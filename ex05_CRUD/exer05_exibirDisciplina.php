<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include("ex05_menu.php"); ?>

    <h1>Exibir</h1>

    <form action="exer05_exibirDisciplinaEx.php" method="GET">
        <label>Sigla: </label>
        <input type="text" name="sigla">
        <input type="submit" value="enviar">
    </form>

</body>

</html>