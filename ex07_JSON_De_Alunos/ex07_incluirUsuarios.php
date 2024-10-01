<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

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
}

?>