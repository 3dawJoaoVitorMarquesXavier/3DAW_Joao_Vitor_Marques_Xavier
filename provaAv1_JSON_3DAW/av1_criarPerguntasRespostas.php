<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = uniqid();

    $dados = json_decode(file_get_contents("php://input"), true);

    $pergunta = $dados["perguntaPost"];

    $resp1 = $dados["aPost"];
    $resp2 = $dados["bPost"];
    $resp3 = $dados["cPost"];
    $resp4 = $dados["dPost"];

    $gabarito = $dados["gabaritoPost"];

    $msg="";

    if (!(file_exists("perguntas.txt"))) {
        $arqPerg = fopen("perguntas.txt", "w") or die("erro ao criar arquivo");
        $linha = "id;pergunta;alternativa_A;alternativa_B;alternativa_C;alternativa_D;gabarito\n";
        fwrite($arqPerg, $linha);
        fclose($arqPerg);
    }

    $arqPerg = fopen("perguntas.txt", "a") or die("erro ao criar arquivo");
    $linha = $id . ";" . $pergunta . ";" . $resp1 . ";" . $resp2 . ";" . $resp3 . ";" . $resp4 . ";" . $gabarito . "\n";
    fwrite($arqPerg, $linha);
    fclose($arqPerg);


    $msg = "Pergunta adicionada!!!";
}