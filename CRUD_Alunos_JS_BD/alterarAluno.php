<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = json_decode(file_get_contents("php://input"), true);

    $matricula = $dados["matricula"];
    $nome = $dados["nome"];
    $cpf = $dados["cpf"];

    $id = $dados["id"];

    $hostname = "localhost";
    $username = "root";
    $senha = "";
    $dbname = "alunos";

    $conn = new mysqli($hostname, $username, $senha, $dbname);

    $comandoSQL = "UPDATE aluno SET matricula = " . "'" . $matricula . "'," . "nome = " . "'" . $nome . "'," . "cpf = " . "'" . $cpf . "'" . "WHERE matricula = " . "'" . $id . "';";

    if ($conn->query($comandoSQL)) {
        $msg = "Aluno alterado";
    } else {
        $msg = "Erro";
    }
}

echo $msg;