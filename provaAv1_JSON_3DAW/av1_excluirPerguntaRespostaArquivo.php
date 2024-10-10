<?php

$msg = "erro";

function excluirNoArq($arqAntigo, $arqNovo, $id)
    {
        $linha = fgets($arqAntigo);
        fwrite($arqNovo,$linha);

    while(!feof($arqAntigo)) {
        $linha = fgets($arqAntigo);
        $linhas = explode(";", $linha);
        if ($linhas[0] != $id){
            fwrite($arqNovo,$linha);
        }
     }

    fclose($arqAntigo);
    fclose($arqNovo);
    
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST["id"];

    $msg = "";

    $arqPerg = fopen("perguntas.txt", "r");
    $arqPergNovo = fopen("perguntasNovo.txt", "w");

    excluirNoArq($arqPerg, $arqPergNovo, $id);

    $arqPerg = fopen("perguntasNovo.txt", "r");
    $arqPergNovo = fopen("perguntas.txt", "w");

    excluirNoArq($arqPerg, $arqPergNovo, $id);

    unlink("perguntasNovo.txt");

    $msg = "excluido";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir uma pergunta</title>
</head>

<body>

    <?php include("av1_menuPerguntaResposta.php"); ?>

    <p><?php echo $msg ?></p>
</body>

</html>