<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $cpf = $_GET["cpf"];

    $arqAlun = fopen("alunos.csv", "r");

    while (!feof($arqAlun)) {
        $linha = fgets($arqAlun);
        $linhas = explode(";", $linha);

        if ($cpf == $linhas[2]) {
            $alt_nome = $linhas[0];
            $alt_matricula = $linhas[1];
            $alt_cpf = $linhas[2];
            $alt_data = strval($linhas[3]);
        }
    }

    fclose($arqAlun);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Aluno</title>
</head>

<body>

    <?php include("ex06_menu.php"); ?>

    <form action="exer06_alterarAlunoConf.php" method="POST">
        <label>nome: </label>
        <input type="text" name="nome" value="<?php echo $alt_nome; ?>">
        <label>Matrícula: </label>
        <input type="number" name="matricula" value="<?php echo $alt_matricula; ?>">
        <label>CPF: </label>
        <input type="number" name="cpf" value="<?php echo $alt_cpf; ?>">
        <label>Data de nascimento: </label>
        <input type="date" id="definirData" name="dataNasc">
        <input type="hidden" id="id" name="id" value="<?php echo $alt_cpf?>">
        <input type="submit" value="alterar dados do aluno>">
    </form>
</body>

</html>