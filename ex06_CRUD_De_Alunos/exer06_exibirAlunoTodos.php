<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir ALunos</title>
</head>

<body>

    <?php include("ex06_menu.php"); ?>

    <table>
        <tr>
            <th>nome</th>
            <th>matrícula</th>
            <th>cpf</th>
            <th>data de nascimento</th>
        </tr>
        <?php
        $arqAlun = fopen("alunos.csv", "r");

        $linha = fgets($arqAlun);

        while (!feof($arqAlun)) {
            $linha = fgets($arqDisc);
            $linhas = explode(";", $linha);

            echo '<tr>';
            for ($i = 0; $i < sizeof($linhas); $i++) {
                echo '<td>' . strval($linhas[$i]) . '</td>';
            }
            echo '</tr>';
        }

        fclose($arqAlun);
        ?>
    </table>
</body>

</html>