<?php

$msg = "erro";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST["sigla"];

    if (!(file_exists("disciplinas2.csv"))) {

        $arqDiscEsc = fopen("disciplinas2.csv", "w");
        $arqDiscLer = fopen("disciplinas.csv", "r");

        $linha = fgets($arqDiscLer);

        while (!feof($arqDiscLer)) {
            $linha = fgets($arqDiscLer);
            $linhas = explode($linha, ";");
            if ($linhas[1] == $id) {
                break;
            }
            fwrite($arqDiscEsc, $linha);
        }

        fclose($arqDiscLer);

        unlink("disciplinas.csv");
        rename("disciplinas2.cvs", "disciplinas.cvs");

        fclose($arqDiscEsc);

        $msg = "excluído";
    }
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
</body>

</html>