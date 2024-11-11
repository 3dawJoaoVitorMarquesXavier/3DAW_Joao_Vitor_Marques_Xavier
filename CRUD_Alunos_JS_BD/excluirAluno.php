<?php

$msg = "erro";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = json_decode(file_get_contents("php://input"), true);
    $id = $dados["id"];

    $hostname = "localhost";
    $username = "root";
    $senha = "";
    $dbname = "alunos";

    $conn = new mysqli($hostname, $username, $senha, $dbname);

    $comandoSQL = "DELETE FROM aluno WHERE matricula" . "= '" . $id . "';";

    if ($conn->query($comandoSQL)) {
        $msg = "Aluno excluido";
    } else {
        $msg = "Erro";
    }
}

echo $msg;