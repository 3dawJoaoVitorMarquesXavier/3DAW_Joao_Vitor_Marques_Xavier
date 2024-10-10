<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir pergunta</title>
</head>

<body>

    <?php include("av1_menuPerguntaResposta.php"); ?>

    <h1>Exibir uma pergunta com gabarito</h1>

    <form action="av1_exibirPerguntaResposta.php" method="POST">
        <label>ID: </label>
        <input type="text" name="id">
        <input type="submit" value="enviar">
    </form>

</body>

</html>