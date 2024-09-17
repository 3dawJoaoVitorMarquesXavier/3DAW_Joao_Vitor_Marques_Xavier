<?php

$msg = "erro";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $exibirNome;
    $exibirSigla;
    $exibirCarga;

    $id = $_POST["sigla"];

    $arqDiscLer = fopen("disciplinas.csv", "r");

    $linha = fgets($arqDiscLer);

    while (!feof($arqDiscLer)) {
        $linha = fgets($arqDiscLer);
        $linhas = explode($linha, ";");
        if ($linhas[1] == $id) {
            $exibirNome = $linha[0];
            $exibirSigla = $linha[1];
            $exibirCarga = $linha[2];
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
    <title>Document</title>
</head>

<body>

    <?php include("ex05_menu.php"); ?>

    <p><?php $msg ?></p>

    <ul>
        <li>Sigla: <?php echo $exibirSigla ?></li>
        <li>Nome: <?php echo $exibirNome ?></li>
        <li>Carga: <?php echo $exibirCarga ?></li>
    </ul>
</body>

</html>