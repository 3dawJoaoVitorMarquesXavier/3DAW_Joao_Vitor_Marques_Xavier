<?php
$nome;
$cpf;
$matricula;
$dataNasc;

$msg = "";

function alterarNoArq($arqAntigo, $arqNovo, $nome, $cpf, $matricula, $dataNasc)
    {
        $linha = fgets($arqAntigo);
        fwrite($arqNovo,$linha);

    while(!feof($arqAntigo)) {
        $linha = fgets($arqAntigo);
        $linhas = explode(";", $linha);
        if (strval($linhas[2]) == $cpf){
            $linha = $nome . ";" . $matricula . ";" . $cpf . ";" . $dataNasc . "\n";
        }
        fwrite($arqNovo,$linha);
     }

    fclose($arqAntigo);
    fclose($arqNovo);
    
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

    $nome = $_POST["nome"];
    $cpf = strval($_POST["cpf"]);
    $matricula = strval($_POST["matricula"]);
    $dataNasc = strval($_POST["dataNasc"]);
    $msg = "";
    
    $arqAlun = fopen("alunos.csv","r") or die("erro ao abrir arquivo");
    $arqAlunTemp = fopen("alunos2.csv","w") or die("erro ao abrir arquivo");

    alterarNoArq($arqAlun, $arqAlunTemp, $nome, $cpf, $matricula, $dataNasc);

    $arqAlunTemp = fopen("aluno2.csv","r") or die("erro ao abrir arquivo");
    $arqAlun = fopen("alunos.csv","w") or die("erro ao abrir arquivo");

    alterarNoArq($arqAlunTemp, $arqAlun, $nome, $cpf, $matricula, $dataNasc);

    unlink("alunos2.csv");
    
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
    <p><?php echo $msg ?></p>
</body>

</html>