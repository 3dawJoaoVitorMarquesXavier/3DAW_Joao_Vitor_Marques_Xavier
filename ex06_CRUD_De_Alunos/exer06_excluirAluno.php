<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
</head>

<body>

<?php include("ex06_menu.php"); ?>

    <h1>excluir</h1>

    <form action="exer06_excluirAlunoConf.php" method="GET">
        <label>CPF: </label>
        <input type="text" name="cpf">
        <input type="submit" value="enviar">
    </form>

</body>

</html>