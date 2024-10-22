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

    $dados = json_decode(file_get_contents("php://input"), true);
    $id = $dados["id"];

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

echo $msg;