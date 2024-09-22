<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $exibirNome;
    $exibirMATRICULA;
    $exibirCPF;
    $exibirDATANASC;

    $msg = "";

    $id = $_GET["cpf"];

    $arqAlunLer = fopen("alunos.csv", "r") or die("erro ao criar arquivo");

    $linha = fgets($arqAlunLer);

    while (!feof($arqAlunLer)) {
        $linha = fgets($arqAlunLer);
        $linhas = explode(";", $linha);
        if ($linhas[2] == $id) {
            $exibirNome = $linhas[0];
            $exibirMATRICULA = strval($linhas[1]);
            $exibirCPF = strval($linhas[2]);
            $exibirDATANASC = strval($linhas[3]);
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
    <title>Exibir aluno</title>
</head>

<body>

    <?php include("ex06_menu.php"); ?>

    <p><?php echo $msg; ?></p>

    <ul>
        <li>Nome: <?php echo $exibirNome; ?></li>
        <li>Matrícula: <?php echo $exibirMATRICULA; ?></li>
        <li>CPF: <?php echo $exibirCPF; ?></li>
        <li>Data de nascimento: <?php echo $exibirDATANASC; ?></li>
    </ul>
</body>

</html>