<?php
include __DIR__ . '/models/estudiante.php';
include __DIR__ . '/controllers/entityController.php';
include __DIR__ . '/controllers/database/databaseController.php';
include __DIR__ . '/controllers/estudiantes/estudianteController.php';

use App\controllers\estudiantes\EstudianteController;

$estudianteController = new EstudianteController();
$lista = $estudianteController->allData();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
</head>

<body>
    <h1>Lista de estudiante</h1>
    <a href = "views/formularioEstudiante.php?operacion=add">Registrar</a>
    <a href = "views/formularioEstudiante.php?operacion=add">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Email</th>
                <th><
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista as $estudiante) {
                echo '<tr>';
                echo '  <td>' . $estudiante->get('codigo') . '</td>';
                echo '  <td>' . $estudiante->get('nombre') . '</td>';
                echo '  <td>' . $estudiante->get('email') . '</td>';
                echo '  <td>';
                echo '      <a href="views/formularioEstudiante.php?operacion=update&codigo=' . $estudiante->get('codigo') . '">Modificar</a>';
                echo '      <a href="views/confirmarEliminacion.php?codigo=' . $estudiante->get('codigo') . '">Eliminar</a>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>