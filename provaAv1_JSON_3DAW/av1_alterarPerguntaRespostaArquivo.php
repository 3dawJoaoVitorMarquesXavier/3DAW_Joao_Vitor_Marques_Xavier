<?php
$msg = "";

function alterarNoArq($arqAntigo, $arqNovo, $pergunta, $resp1, $resp2, $resp3, $resp4, $gabarito, $id)
    {
        $linha = fgets($arqAntigo);
        fwrite($arqNovo,$linha);

    while(!feof($arqAntigo)) {
        $linha = fgets($arqAntigo);
        $linhas = explode(";", $linha);
        if ($linhas[0] == $id){
            $linha = $id . ";" . $pergunta . ";" . $resp1 . ";" . $resp2 . ";" . $resp3 . ";" . $resp4 . ";" . $gabarito . "\n";
        }
        fwrite($arqNovo,$linha);
     }

    fclose($arqAntigo);
    fclose($arqNovo);
    
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

    $pergunta = $_POST["pergunta"];

    $resp1 = $_POST["a"];
    $resp2 = $_POST["b"];
    $resp3 = $_POST["c"];
    $resp4 = $_POST["d"];
    
    $gabarito = $_POST["gabarito"];

    $id = $_POST["id"];

    $msg = "";
    
    $arqPerg = fopen("perguntas.txt","r") or die("erro ao abrir arquivo");
    $arqPergTemp = fopen("perguntasTemp.txt","w") or die("erro ao abrir arquivo");

    alterarNoArq($arqPerg, $arqPergTemp, $pergunta, $resp1, $resp2, $resp3, $resp4, $gabarito, $id);

    $arqPergTemp = fopen("perguntasTemp.txt","r") or die("erro ao abrir arquivo");
    $arqPerg = fopen("perguntas.txt","w") or die("erro ao abrir arquivo");

    alterarNoArq($arqPergTemp, $arqPerg, $pergunta, $resp1, $resp2, $resp3, $resp4, $gabarito, $id);

    unlink("perguntasTemp.txt");
    
    $msg = "Deu tudo certo!!!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perguntas</title>
</head>

<?php include("av1_menuPerguntaResposta.php"); ?>

<body>
    <p><?php echo $msg ?></p>
</body>

</html>