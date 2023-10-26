<?php
include __DIR__ . '/models/docente.php'; // Cambiado a "docente.php"
include __DIR__ . '/controllers/entityController.php';
include __DIR__ . '/controllers/database/databaseController.php';
include __DIR__ . '/controllers/docentes/docenteController.php'; // Cambiado a "docentes/docenteController.php"

use App\controllers\docentes\DocenteController;
$docenteController = new docenteController();
$lista = $docenteController->allData();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Docentes</title>
</head>

<body>
    <h1>Lista de Docentes</h1>
    <a href="views/formularioDocente.php?operacion=add">Registrar Docente</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Ocupacion</th>
                </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista as $docente) {
                echo '<tr>';
                echo '  <td>' . $docente->get('cod') . '</td>'; // Cambiado a "cod"
                echo '  <td>' . $docente->get('nombre') . '</td>';
                echo '  <td>' . $docente->get('idOcupacion') . '</td>'; // Cambiado a "idOcupacion"
                echo '  <td>';
                echo '      <a href="views/formularioDocente.php?operacion=update&codigo=' . $docente->get('cod') . '">Modificar</a>'; // Cambiado a "cod"
                echo '      <a href="views/confirmarEliminacion.php?codigo=' . $docente->get('cod') . '">Eliminar</a>'; // Cambiado a "cod"
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>
