<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];
    $msg = "";

    echo "nome: " . $nome . " sigla: " . $sigla . " carga: " . $carga;

    if (!(file_exists("disciplinas.csv"))) {
        $arqDisc = fopen("disciplinas.csv", "w") or die("erro ao criar arquivo");
        $linha = "nome;sigla;carga\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }

    $arqDisc = fopen("disciplinas.csv", "a") or die("erro ao criar arquivo");
    $linha = $nome . ";" . $sigla . ";" . $carga . "\n";
    fwrite($arqDisc, $linha);
    fclose($arqDisc);


    $msg = "Deu tudo certo!!!";
}

?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <?php include("ex05_menu.php"); ?>

    <h1>Criar Nova Disciplina</h1>
    <form action="ex05_incluirDisciplina.php" method="POST">
        Nome: <input type="text" name="nome">
        <br><br>
        Sigla: <input type="text" name="sigla">
        <br><br>
        Carga Horaria: <input type="text" name="carga">
        <br><br>
        <input type="submit" value="Criar Nova Disciplina">
    </form>
    <p><?php echo $msg ?></p>
    <br>
</body>

</html>