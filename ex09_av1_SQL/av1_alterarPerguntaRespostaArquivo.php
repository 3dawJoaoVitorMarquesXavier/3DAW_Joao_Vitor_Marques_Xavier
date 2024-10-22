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

    $dados = json_decode(file_get_contents("php://input"), true);

    $pergunta = $dados["perguntaPost"];

    $resp1 = $dados["aPost"];
    $resp2 = $dados["bPost"];
    $resp3 = $dados["cPost"];
    $resp4 = $dados["dPost"];

    $gabarito = $dados["gabaritoPost"];

    $id = $dados["id"];

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

echo $msg;