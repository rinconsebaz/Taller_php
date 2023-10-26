<!DOCTYPE html>
<html lang = 'es'>
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Calculadora de Promedio de Notas</title>
</head>
<body>
    <h1>Calculadora de Promedio de Notas</h1>
    <form class="textos" method="post" action="">
        <label for="materia">Nombre de la materia:</label>
        <input type="text" name="materia" id="materia" required><br><br>
        <label for="cantidad_notas">Cantidad de notas:</label>
        <input type="number" name="cantidad_notas" id="cantidad_notas" required><br><br>
        <label for="rango_min">Calificación mínima:</label>
        <input type="number" name="rango_min" id="rango_min" required><br><br>
        <label for="rango_max">Calificación máxima:</label>
        <input type="number" name="rango_max" id="rango_max" required><br><br>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $materia = $_POST['materia'];
            $cantidad_notas = $_POST['cantidad_notas'];
            $rango_min = $_POST['rango_min'];
            $rango_max = $_POST['rango_max'];
            $notas = array();
            $promedio = 0;

            for ($i = 1; $i <= $cantidad_notas; $i++) {
                echo '<label for="nota' . $i . '">Nota ' . $i . ':</label>';
                echo '<input type="number" name="nota' . $i . '" id="nota' . $i . '" required>';
                echo '<br><br>';
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                for ($i = 1; $i <= $cantidad_notas; $i++) {
                    $nota = $_POST['nota' . $i];
                    if ($nota < $rango_min || $nota > $rango_max) {
                        echo '<p style="color: red;">La nota ' . $i . ' está fuera del rango permitido.</p>';
                    } else {
                        $notas[] = $nota;
                        $promedio += $nota;
                    }
                }

                if (count($notas) > 0) {
                    $promedio /= count($notas);
                    $nota_min_aprobar = ($rango_min + $rango_max) / 2 + 0.5;
                    $aprobar = ($promedio >= $nota_min_aprobar) ? 'Sí' : 'No';

                    echo '<h2>Resultado</h2>';
                    echo 'Materia: ' . $materia . '<br>';
                    echo 'Promedio de notas: ' . number_format($promedio, 2) . '<br>';
                    echo 'Nota mínima para aprobar: ' . $nota_min_aprobar . '<br>';
                    echo '¿Aprobado? ' . $aprobar;
                }
            }
        }
        ?>

        <br><br>
        <input class="button" type="submit" value="Calcular Promedio">
        <a href="index.html" class="button" >VOLVER</a>
    </form>
</body>
</html>