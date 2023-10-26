<?php
include __DIR__ . '/../models/docente.php'; // Cambiado a "docente.php"
include __DIR__ . '/../controllers/entityController.php';
include __DIR__ . '/../controllers/database/databaseController.php';
include __DIR__ . '/../controllers/docentes/docenteController.php'; // Cambiado a "docentes/docenteController.php"

use App\models\docente; // Cambiado a "Docente"
use App\controllers\docentes\docenteController; // Cambiado a "docentes\DocenteController"

$operacion = $_GET['operacion'];
$docenteController = new DocenteController(); // Cambiado a "DocenteController"
$docente = new Docente(); // Cambiado a "Docente"

if ($operacion == 'update') {
    $docente = $docenteController->getItem($_GET['codigo']); // Cambiado a "DocenteController" y "getItem"
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Datos del Docente</h1>
    <?php
    if(!isset($docente)) {
        echo '<p>El registro no existe</p>';
        die();
    }
    ?>
    <form action="accionDocente.php" method="post"> <!-- Cambiado a "accionDocente.php" -->
        <input type="hidden" name="operacion" value="<?php echo $operacion; ?>"> <!-- Cambiado a "operacion" -->
        <div>
            <label>Código:</label>
            <input type="text" name="codigo" required value="<?php echo $docente->get('cod'); ?>"> <!-- Cambiado a "cod" -->
        </div>
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" required value="<?php echo $docente->get('nombre'); ?>"> <!-- Cambiado a "nombre" -->
        </div>
        <div>
            <label>Ocupación:</label>
            <!--
