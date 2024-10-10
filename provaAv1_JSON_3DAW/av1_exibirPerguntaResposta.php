<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $exibirPergunta;

    $exibirResp1;
    $exibirResp2;
    $exibirResp3;
    $exibirResp4;

    $exibirGabarito;

    $exibirId;

    $msg = "";

    $id = $_POST["id"];

    $arqPergLer = fopen("perguntas.txt", "r") or die("erro ao criar arquivo");

    $linha = fgets($arqPergLer);

    while (!feof($arqPergLer)) {
        $linha = fgets($arqPergLer);
        $linhas = explode(";", $linha);
        if ($linhas[0] == $id) {
            $exibirId = $linhas[0];
            $exibirPergunta = $linhas[1];
            $exibirResp1 = $linhas[2];
            $exibirResp2 = $linhas[3];
            $exibirResp3 = $linhas[4];
            $exibirResp4 = $linhas[5];
            $exibirGabarito = $linhas[6];
        }
    }

    $msg = "Exibir: ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir uma pergunta com gabarito</title>
</head>

<body>

    <?php include("av1_menuPerguntaResposta.php"); ?>

    <p><?php echo $msg; ?></p>

    <ul>
        <li>ID: <?php echo $exibirID; ?></li>
        <li>Pergunta: <?php echo $exibirPergunta; ?></li>
        <li>Alternativa A: <?php echo $exibirResp1; ?></li>
        <li>Alternativa B: <?php echo $exibirResp2; ?></li>
        <li>Alternativa C: <?php echo $exibirResp3; ?></li>
        <li>Alternativa D: <?php echo $exibirResp4; ?></li>
        <li>Gabarito: <?php echo $exibirGabarito; ?></li>
    </ul>
</body>

</html>