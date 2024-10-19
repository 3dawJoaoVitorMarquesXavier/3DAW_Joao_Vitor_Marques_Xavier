<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = json_decode(file_get_contents("php://input"), true);
    $id = $dados["id"];

    $arqPerg = fopen("perguntas.txt", "r");

    $jsonString='[';

    while (!feof($arqPerg)) {
        $linha = fgets($arqPerg);
        $linhas = explode(";", $linha);

        if ($id == $linhas[0]) {
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

    fclose($arqPerg);

    echo $jsonString;
}