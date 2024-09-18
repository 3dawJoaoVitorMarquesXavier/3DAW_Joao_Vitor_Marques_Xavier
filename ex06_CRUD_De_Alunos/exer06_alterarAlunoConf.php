<?php
$nome = "";
$cpf = "";
$matricula = "";
$dataNasc = "";
$id = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $matricula = strval($_POST["matricula"]);
    $cpf = strval($_POST["cpf"]);
    $dataNasc = $_POST["dataNasc"]->format('Y-m-d H:i:s');
    $id = $_POST("id");
    $msg = "";

    $arqAlun = fopen("disciplinas.txt", "r") or die("erro ao abrir arquivo");
    $arqAlunNovo = fopen("disciplinas.txt", "w") or die("erro ao abrir arquivo");

    $linha = fgets($arqAlun);
    fwrite($arqAlunNovo, $linha);

    while (!feof($arqAlun)) {
        $linha = fgets($arqAlun);
        $linhas = explode(";", $linha);
        if ($linhas[2] == $cpf) {
            $linha = $nome . ';' . $matricula . ';' . $cpf . ';' . $dataNasc . '\n';
        }
        fwrite($arqAlunNovo, $linha);
    }
    fclose($arqAlun);
    fclose($arqAlunNovo);
    $msg = "Deu tudo certo!!!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Aluno</title>
</head>

<?php include("ex06_menu.php"); ?>

<body>
    <p><?php $msg ?></p>
</body>

</html>