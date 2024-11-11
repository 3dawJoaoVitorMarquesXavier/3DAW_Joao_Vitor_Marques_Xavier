<?php
echo "hello";
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dados = json_decode(file_get_contents("php://input"), true);

    $nome = $dados['nome'];
    $matricula = $dados['matricula'];
    $cpf = $dados['cpf'];

    $username = "root";
    $hostname = "localhost";
    $senha = "";
    $dbname = "alunos";

    $conn = new mysqli($hostname, $username, $senha, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $comandoSQL = "INSERT INTO aluno (matricula, nome, cpf) VALUES ( " . "'" . $matricula . "'" . "," . "'" . $nome . "'" . "," . "'" . $cpf . "')";

    if ($conn->query($comandoSQL)) {
        $msg = "inserido";
    } else {
        $msg = "erro";
    }
}


echo $msg;