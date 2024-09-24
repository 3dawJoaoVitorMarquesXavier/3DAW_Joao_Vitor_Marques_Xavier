<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = uniqid();

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $msg="";

    //echo "nome: " . $nome . " matricula: " . $matricula . " cpf: " . $cpf . " dataNasc: " . $dataNasc;

    if (!(file_exists("usuarios.txt"))) {
        $arqUsuarios = fopen("usuarios.txt", "w") or die("erro ao criar arquivo");
        $linha = "id;nome;email;senha\n";
        fwrite($arqUsuarios, $linha);
    }

    $arqUsuarios = fopen("usuarios.txt", "a") or die("erro ao criar arquivo");
    $linha = $id . ";" . $nome . ";" . $email . ";" . $senha . "\n";
    fwrite($arqUsuarios, $linha);
    fclose($arqUsuarios);


    $msg = "Usuario adicionado!!!";
}

?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>

<?php include("av1_menuPerguntaResposta.php"); ?>

    <h1>Incluir usuarios</h1>
    <form action="av1_incluirUsuarios.php" method="POST">
        <label>nome</label>
        <input type="text" name="nome">
        <br><br>
        <label>email</label>
        <input type="email" name="email">
        <br><br>
        <label>senha</label>
        <input type="password" name="senha">
        <br><br>
        <input type="submit" value="Incluir usuario">
    </form>
    <p><?php echo $msg ?></p>
    <br>
</body>

</html>