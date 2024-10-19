<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST["id"];

    $arqPerg = fopen("perguntas.txt", "r");

    while (!feof($arqPerg)) {
        $linha = fgets($arqPerg);
        $linhas = explode(";", $linha);

        if ($id == $linhas[0]) {
            $alt_pergunta = $linhas[1];
            $alt_resp1 = $linhas[2];
            $alt_resp2 = $linhas[3];
            $alt_resp3 = $linhas[4];
            $alt_resp4 = $linhas[5];
            $alt_gabarito = $linhas[6];
        }
    }

    fclose($arqPerg);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta</title>
</head>

<body>

    <form action="av1_alterarPerguntaRespostaArquivo.php" method="POST">
        <label>pergunta: </label>
        <input type="text" name="pergunta" value="<?php echo $alt_pergunta; ?>">
        <br><br>
        <label>Alternativa A: </label>
        <input type="text" name="a" value="<?php echo $alt_resp1; ?>">
        <br><br>
        <label>Alternativa B: </label>
        <input type="text" name="b" value="<?php echo $alt_resp2; ?>">
        <br><br>
        <label>Alternativa C: </label>
        <input type="text" name="c" value="<?php echo $alt_resp3; ?>">
        <br><br>
        <label>Alternativa D: </label>
        <input type="text" name="d" value="<?php echo $alt_resp4; ?>">
        <br><br>
        <br><br>
        <label>Gabarito atual: <?php echo $alt_gabarito?></label>
        <br><br>
        <p>Alterar</p>
        <label>A </label>
        <input type="radio" name="gabarito" value="alternativa_a">
        <br><br>
        <label>B </label>
        <input type="radio" name="gabarito" value="alternativa_b">
        <br><br>
        <label>C </label>
        <input type="radio" name="gabarito" value="alternativa_c">
        <br><br>
        <label>D </label>
        <input type="radio" name="gabarito" value="alternativa_d">
        <br><br>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="submit" value="alterar dados da pergunta>">
    </form>
</body>

</html>