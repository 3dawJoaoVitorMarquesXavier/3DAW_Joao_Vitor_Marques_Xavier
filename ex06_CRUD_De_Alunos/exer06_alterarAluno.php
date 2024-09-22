<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Aluno</title>
</head>

<body>

    <?php include("ex06_menu.php"); ?>

    <h1>Alterar Aluno</h1>

    <form action="exer06_alterarAlunoAlt.php" method="GET">
        <label>CPF: </label>
        <input type="number" name="cpf">
        <input type="submit" value="enviar">
    </form>

</body>

</html>