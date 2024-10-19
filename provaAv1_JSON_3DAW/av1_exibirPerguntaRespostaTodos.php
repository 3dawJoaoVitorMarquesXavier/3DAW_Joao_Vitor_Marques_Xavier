<?php
        $arqPerg = fopen("perguntas.txt", "r");

        $linha = fgets($arqPerg);

        $jsonString='[';

        while (!feof($arqPerg)) {
            $linha = fgets($arqPerg);
            $linhas = explode(";", $linha);
            for ($i = 0; $i < sizeof($linhas); $i++) {
                switch($i)
                {
                    case 0:$jsonString = $jsonString . '{"id":' . '"'  . $linhas[$i] . '"'  . ',';
                    break;
                    case 1:$jsonString = $jsonString . '"pergunta":' . '"' . $linhas[$i] . '"' .  ',';
                    break;
                    case 2:$jsonString = $jsonString . '"alternativa_A":' . '"'  . $linhas[$i] . '"' .  ',';
                    break;
                    case 3:$jsonString = $jsonString . '"alternativa_B":' . '"'  . $linhas[$i] . '"' .  ',';
                    break;
                    case 4:$jsonString = $jsonString . '"alternativa_C":' . '"'  . $linhas[$i] . '"' .  ',';
                    break;
                    case 5:$jsonString = $jsonString . '"alternativa_D":' . '"'  . $linhas[$i] . '"' .  ',';
                    break;
                    case 6:$jsonString = $jsonString . '"gabarito":' . '"' . '"' . '},';
                }
            }
        }

        $jsonString = mb_substr($jsonString, 0, -10);

        $jsonString = $jsonString . ']';

        fclose($arqPerg);


        echo $jsonString;