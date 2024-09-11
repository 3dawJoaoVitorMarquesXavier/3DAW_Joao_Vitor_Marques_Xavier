<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include("ex05_menu.php"); ?>

    <table>
        <tr>
            <th>nome</th>
            <th>sigla</th>
            <th>carga</th>
        </tr>
        <?php
        $arqDisc = fopen("disciplinas.csv", "r");

        $linha = fgets($arqDisc);

        while (!feof($arqDisc)) {
            $linha = fgets($arqDisc);
            $linhas = explode(";", $linha);

            echo '<tr>';
            for ($i = 0; $i < 3; $i++) {
                echo '<td>' . $linhas[$i] . '</td>';
            }
            echo '</tr>';
        }

        fclose($arqDisc);
        ?>
    </table>
</body>

</html>