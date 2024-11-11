<?php
$retorno = "";

$hostname = "localhost";
$username = "root";
$senha = "";
$dbname = "alunos";

$conn = new mysqli($hostname, $username, $senha, $dbname);

$comandoSQL = "SELECT * FROM aluno";
$resultado = $conn->query($comandoSQL);

$dadoAluno[] = array();
$i = 0;

while ($linha = $resultado->fetch_assoc()) {
    $dadoAluno[$i] = $linha;
    $i++;
}

if ($resultado == TRUE) {
    $retorno = json_encode($dadoAluno);
} else {
    $retorno = json_encode("erro");
}

echo $retorno;