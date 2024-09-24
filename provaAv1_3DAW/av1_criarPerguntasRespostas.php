<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = uniqid();

    $pergunta = $_POST["pergunta"];

    $resp1 = $_POST["a"];
    $resp2 = $_POST["b"];
    $resp3 = $_POST["c"];
    $resp4 = $_POST["d"];

    $gabarito = $_POST["gabarito"];

    $msg="";

    //echo "nome: " . $nome . " matricula: " . $matricula . " cpf: " . $cpf . " dataNasc: " . $dataNasc;

    if (!(file_exists("perguntas.txt"))) {
        $arqPerg = fopen("perguntas.txt", "w") or die("erro ao criar arquivo");
        $linha = "id;pergunta;alternativa_A;alternativa_B;alternativa_C;alternativa_D;gabarito\n";
        fwrite($arqPerg, $linha);
    }

    $arqPerg = fopen("perguntas.txt", "a") or die("erro ao criar arquivo");
    $linha = $id . ";" . $pergunta . ";" . $resp1 . ";" . $resp2 . ";" . $resp3 . ";" . $resp4 . ";" . $gabarito . "\n";
    fwrite($arqPerg, $linha);
    fclose($arqPerg);


    $msg = "Pergunta adicionada!!!";
}

?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>

<?php include("av1_menuPerguntaResposta.php"); ?>

    <h1>Criar perguntas e respostas</h1>
    <form action="av1_criarPerguntasRespostas.php" method="POST">
        pergunta: <input type="text" name="pergunta">
        <br><br>
        Resposta A: <input type="text" name="a">
        <br><br>
        Resposta B: <input type="text" name="b">
        <br><br>
        Resposta C: <input type="text" name="c">
        <br><br>
        Resposta D: <input type="text" name="d">
        <br><br>
        Gabarito:
        <br><br>
        <br><br>
        Alternativa A<input type="radio" name="gabarito" value="alternativa_a">
        <br><br>
        Alternativa B<input type="radio" name="gabarito" value="alternativa_b">
        <br><br>
        Alternativa C<input type="radio" name="gabarito" value="alternativa_c">
        <br><br>
        Alternativa D<input type="radio" name="gabarito" value="alternativa_d">
        <br><br>
        <input type="submit" value="Adicionar pergunta">
    </form>
    <p><?php echo $msg ?></p>
    <br>
</body>

</html>