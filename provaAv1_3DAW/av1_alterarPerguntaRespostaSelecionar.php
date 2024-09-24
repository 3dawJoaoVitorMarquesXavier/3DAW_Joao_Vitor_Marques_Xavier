<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta</title>
</head>

<body>

    <?php include("av1_menuPerguntaResposta.php"); ?>

    <h1>Alterar Pergunta</h1>

    <form action="av1_alterarPerguntaResposta.php" method="POST">
        <label>ID: </label>
        <input type="text" name="id">
        <input type="submit" value="enviar">
    </form>

</body>

</html>