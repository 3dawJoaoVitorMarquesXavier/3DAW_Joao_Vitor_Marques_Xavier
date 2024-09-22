<?php

$msg = "erro";

function excluirNoArq($arqAntigo, $arqNovo, $id)
    {
        $linha = fgets($arqAntigo);
        fwrite($arqNovo,$linha);

    while(!feof($arqAntigo)) {
        $linha = fgets($arqAntigo);
        $linhas = explode(";", $linha);
        if ($linhas[2] != $id){
            fwrite($arqNovo,$linha);
        }
     }

    fclose($arqAntigo);
    fclose($arqNovo);
    
    }

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET["cpf"];

    $msg = "";

    $arqAlun = fopen("alunos.csv", "r");
    $arqAlunNovo = fopen("alunos2.csv", "w");

    excluirNoArq($arqAlun, $arqAlunNovo, $id);

    $arqAlun = fopen("alunos2.csv", "r");
    $arqAlunNovo = fopen("alunos.csv", "w");

    excluirNoArq($arqAlun, $arqAlunNovo, $id);

    unlink("alunos2.csv");

    $msg = "excluido";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
</head>

<body>

    <?php include("ex06_menu.php"); ?>

    <p><?php echo $msg ?></p>
</body>

</html>