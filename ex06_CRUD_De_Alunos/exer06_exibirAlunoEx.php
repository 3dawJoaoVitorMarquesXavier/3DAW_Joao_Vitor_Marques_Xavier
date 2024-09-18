<?php

$msg = "erro";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $exibirNome;
    $exibirMATRICULA;
    $exibirCPF;
    $exibirDATANASC;

    $id = strval($_GET["cpf"]);

    $arqAlunLer = fopen("alunos.csv", "r");

    $linha = fgets($arqAlunLer);

    while (!feof($arqAlunLer)) {
        $linha = fgets($arqAlunLer);
        $linhas = explode(";", $linhas);
        if ($linhas[2] == $id) {
            $exibirNome = $linha[0];
            $exibirMATRICULA = strval($linha[1]);
            $exibirCPF = strval($linha[2]);
            $exibirDATANASC = strval($linha[3]);
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