<?php
$v1 = $_GET["a"];
$v2 = $_GET["b"];

$op=$_GET["op"];

switch($op)
{
    case "+":
        $result=$v1+$v2;
    break;

    case "-":
        $result=$v1-$v2;
    break;

    case "*":
        $result=$v1*$v2;
    break;

    case "/":
        $result=$v1/$v2;
    break;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calculadora.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Calculadora</title>
</head>
<body>
    <?php
    echo "
    <section class='calculadora'>
    <h1>Resultado da operacao '$v1 $op $v2': $result</h1>
    </section>
    ";
    ?>
</body>
</html>