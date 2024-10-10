<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar todas as perguntas com gabarito</title>
</head>

<body>

    <?php include("av1_menuPerguntaResposta.php"); ?>

    <table>
        <tr>
            <th>id</th>
            <th>pergunta</th>
            <th>alternativa A</th>
            <th>alternativa B</th>
            <th>alternativa C</th>
            <th>alternativa D</th>
            <th>gabarito</th>
        </tr>
        <?php
        $arqPerg = fopen("perguntas.txt", "r");

        $linha = fgets($arqPerg);

        while (!feof($arqPerg)) {
            $linha = fgets($arqPerg);
            $linhas = explode(";", $linha);

            echo '<tr>';
            for ($i = 0; $i < sizeof($linhas); $i++) {
                echo '<td>' . $linhas[$i] . '</td>';
            }
            echo '</tr>';
        }

        fclose($arqPerg);
        ?>
    </table>
</body>

</html>