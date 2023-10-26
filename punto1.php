<!DOCTYPE html>
<html lang ='es'>
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Punto 1</title>
</head>
<body >

<?php

$lista_numeros = [8, 3, 12, 5, 9, 20, 6, 17, 4];


sort($lista_numeros);


$lista_pares = array_filter($lista_numeros, function($numero) {
    return $numero % 2 == 0;
});
rsort($lista_pares);


$lista_impares = array_filter($lista_numeros, function($numero) {
    return $numero % 2 != 0;
});
sort($lista_impares);


echo "Lista ordenada de menor a mayor: " . implode(", ", $lista_numeros) . "<br>";
echo "Lista de números pares ordenados de mayor a menor: " . implode(", ", $lista_pares) . "<br>";
echo "Lista de números impares ordenados de menor a mayor: " . implode(", ", $lista_impares);
?>
<a href="index.html" class="button" >"VOLVER"</a>
</body>
</html>