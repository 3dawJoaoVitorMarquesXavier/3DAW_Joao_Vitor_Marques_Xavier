<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = uniqid();

    $dados = json_decode(file_get_contents("php://input"), true);

    $nome = $dados['nomePost']; 
    $email = $dados['emailPost']; 
    $senha = $dados['senhaPost']; 

    if (!(file_exists("usuarios.txt"))) {
        $arqUsuarios = fopen("usuarios.txt", "w") or die("erro ao criar arquivo");
        $linha = "id;nome;email;senha\n";
        fwrite($arqUsuarios, $linha);
        fclose($arqUsuarios);
    }

    $arqUsuarios = fopen("usuarios.txt", "a") or die("erro ao criar arquivo");
    $linha = $id . ";" . $nome . ";" . $email . ";" . $senha . "\n";
    fwrite($arqUsuarios, $linha);
    fclose($arqUsuarios);


    $msg = "Usuario adicionado!!!";
}

echo $msg;