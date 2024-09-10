<?php

$msg = "erro";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $alt_linha = $_POST["nome"] . ";" . $_POST["sigla"] . ";" . $_POST["carga"];

    $id = $_POST["id"];

    if (!(file_exists("disciplinas2.csv"))) {

        $arqDiscEsc = fopen("disciplinas2.csv", "w");
        $arqDiscLer = fopen("disciplinas.csv", "r");

        $linha = fgets($arqDiscLer);

        while (!feof($arqDiscLer)) {
            $linha = fgets($arqDiscLer);
            $linhas = explode($linha, ";");
            if ($linhas[1] == $id) {
                fwrite($arqDiscEsc, $alt_linha);
            }
            fwrite($arqDiscEsc, $linha);
        }

        fclose($arqDiscLer);

        unlink("disciplinas.csv");
        rename("disciplinas2.cvs", "disciplinas.cvs");

        fclose($arqDiscEsc);

        $msg = "alterado";
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

<?php include("escolher.php"); ?>

<body>
    <p><?php $msg ?></p>
</body>

</html>