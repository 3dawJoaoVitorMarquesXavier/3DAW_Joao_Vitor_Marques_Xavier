<?php

$retorno = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = json_decode(file_get_contents("php://input"), true);
    $id = $dados["id"];

    $hostname = "localhost";
    $username = "root";
    $senha = "";
    $dbname = "alunos";

    $conn = new mysqli($hostname, $username, $senha, $dbname);

    $comandoSQL = "SELECT * FROM aluno WHERE matricula" . "='" . $id . "';";

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
}