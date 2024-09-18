<?php

$msg = "erro";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST["cpf"];

    $arqAlun = fopen("alunos.csv", "w");
    $arqAlunNovo = fopen("alunos.csv", "r");

    $linha = fgets($arqAlun);

    while (!feof($arqAlun)) {
        $linha = fgets($arqAlun);
        $linhas = explode($linha, ";");
        if ($linhas[2] == $id) {
            break;
        }
        fwrite($arqAlunNovo, $linha);
    }

    fclose($arqAlun);
    fclose($arqAlunNovo);

    $msg = "excluído";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
</head>

<body>

    <?php include("ex06_menu.php"); ?>

    <p><?php $msg ?></p>
</body>

</html>