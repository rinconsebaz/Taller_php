<?php
include __DIR__ . '/../models/docente.php'; // Cambiado a "docente.php"
include __DIR__ . '/../controllers/entityController.php';
include __DIR__ . '/../controllers/database/databaseController.php';
include __DIR__ . '/../controllers/docentes/docenteController.php'; // Cambiado a "docentes/docenteController.php"

use App\models\docente; // Cambiado a "Docente"
use App\controllers\docentes\docenteController; // Cambiado a "docentes\DocenteController"

$operacion = $_POST['operacion'];
$resultado = '';
$docenteController = new DocenteController(); // Cambiado a "DocenteController"

if ($operacion == 'delete') {
    $resultado = $docenteController->deleteItem($_POST['cod']); // Cambiado a "cod"
} else {
    $docente = new Docente();
    $docente->set('cod', $_POST['cod']);
    $docente->set('nombre', $_POST['nombre']);
    // Para el campo idOcupacion, debes cargar las opciones desde la tabla "ocupacion" en un campo select
    $docente->set('idOcupacion', $_POST['idOcupacion']); // Asegúrate de que este campo esté relacionado con "ocupacion"
    
    $resultado = ($operacion == 'update')
        ? $docenteController->updateItem($docente)
        : $docenteController->addItem($docente);
}

// Si $resultado == true, se guardó el registro;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php
    echo $resultado;
    ?>
</body>
</html>