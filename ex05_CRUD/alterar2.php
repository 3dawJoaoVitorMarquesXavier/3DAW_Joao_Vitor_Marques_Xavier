<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sigla = $_GET["sigla"];

    $arqDisc = fopen("disciplinas.csv", "r");

    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $linhas = explode(";", $linha);

        if ($sigla == $linhas[1]) {
            $alt_nome = $linhas[0];
            $alt_sigla = $linhas[1];
            $alt_carga = $linhas[2];
        }
    }

    fclose($arqDisc);
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

    <?php include("escolher.php"); ?>

    <form action="alterar3.php" method="POST">
        <label>nome: </label>
        <input type="text" name="nome" value="<?php echo $alt_nome ?>">
        <label>sigla: </label>
        <input type="text" name="sigla" value="<?php echo $alt_sigla ?>">
        <label>carga: </label>
        <input type="text" name="carga" value="<?php echo $alt_carga ?>">
        <input type="hidden" name="id" value="<?php $sigla ?>">
        <input type="submit" value="alterar>">
    </form>
</body>

</html>