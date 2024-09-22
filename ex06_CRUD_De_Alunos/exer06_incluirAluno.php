<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST["nome"];
    $matricula = strval($_POST["matricula"]);
    $cpf = strval($_POST["cpf"]);
    $dataNasc = strval($_POST["dataNasc"]);

    $msg="";

    echo "nome: " . $nome . " matricula: " . $matricula . " cpf: " . $cpf . " dataNasc: " . $dataNasc;

    if (!(file_exists("alunos.csv"))) {
        $arqAlun = fopen("alunos.csv", "w") or die("erro ao criar arquivo");
        $linha = "nome;matricula;cpf;data\n";
        fwrite($arqAlun, $linha);
        fclose($arqAlun);
    }

    $arqAlun = fopen("alunos.csv", "a") or die("erro ao criar arquivo");
    $linha = $nome . ";" . $matricula . ";" . $cpf . ";" . $dataNasc . "\n";
    fwrite($arqAlun, $linha);
    fclose($arqAlun);


    $msg = "Aluno adicionado!!!";
}

?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>

<?php include("ex06_menu.php"); ?>

    <h1>Incluir aluno</h1>
    <form action="exer06_incluirAluno.php" method="POST">
        Nome: <input type="text" name="nome">
        <br><br>
        Matricula: <input type="number" name="matricula">
        <br><br>
        CPF: <input type="number" name="cpf">
        <br><br>
        Data de nascimento: <input type="date" name="dataNasc">
        <br><br>
        <input type="submit" value="Adicionar novo aluno">
    </form>
    <p><?php echo $msg ?></p>
    <br>
</body>

</html>