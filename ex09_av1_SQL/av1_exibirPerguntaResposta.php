<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = json_decode(file_get_contents("php://input"), true);
    $id = $dados["id"];

    $msg = "";

    $arqPergLer = fopen("perguntas.txt", "r") or die("erro ao criar arquivo");

    $jsonString='[';

    $linha = fgets($arqPergLer);

    while (!feof($arqPergLer)) {
        $linha = fgets($arqPergLer);
        $linhas = explode(";", $linha);

        if ($linhas[0] == $id) {
            $jsonString = $jsonString . '{"id":' . '"'  . $linhas[0] . '"'  . ',';
            $jsonString = $jsonString . '"pergunta":' . '"' . $linhas[1] . '"' .  ',';
            $jsonString = $jsonString . '"alternativa_A":' . '"'  . $linhas[2] . '"' .  ',';
            $jsonString = $jsonString . '"alternativa_B":' . '"'  . $linhas[3] . '"' .  ',';
            $jsonString = $jsonString . '"alternativa_C":' . '"'  . $linhas[4] . '"' .  ',';
            $jsonString = $jsonString . '"alternativa_D":' . '"'  . $linhas[5] . '"' .  ',';
            $jsonString = $jsonString . '"gabarito":' . '"' . '"' . '},';
        }
    }

    $jsonString = mb_substr($jsonString, 0, -1);

    $jsonString = $jsonString . ']';

    echo $jsonString;
}