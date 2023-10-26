<?php
namespace App\controllers\docentes;

use App\controllers\EntityController;
use App\models\Docente; // Cambiado a Docente en lugar de Estudiante

class DocenteController extends EntityController {

    function allData(){
        // Consulta SQL para seleccionar todos los registros de docentes
        $sql = "SELECT * FROM docentes";
        // Ejecutar la consulta SQL usando el método execSql del controlador base
        $resultSQL = $this->execSql($sql);
        $lista = [];
        // Verificar si se obtuvieron resultados de la consulta
        if($resultSQL->num_rows > 0){
            while($item = $resultSQL->fetch_assoc()){
                // Crear un objeto Docente y asignarle los datos obtenidos de la base de datos
                $docente = new Docente();
                $docente->set('cod', $item['cod']);
                $docente->set('nombre', $item['nombre']);
                $docente->set('idOcupacion', $item['idOcupacion']);
                // Agregar el objeto Docente a la lista
                array_push($lista, $docente);
            }
        }
        // Devolver la lista de docentes
        return $lista;
    }

    function getItem($codigo){
        // Consulta SQL para seleccionar un docente específico por código
        $sql = "SELECT * FROM docentes WHERE cod = $codigo";
        // Ejecutar la consulta SQL usando el método execSql del controlador base
        $resultSQL = $this->execSql($sql);
        $docente = null;
        // Verificar si se obtuvieron resultados de la consulta
        if($resultSQL->num_rows > 0){
            while($item = $resultSQL->fetch_assoc()){
                // Crear un objeto Docente y asignarle los datos obtenidos de la base de datos
                $docente = new Docente();
                $docente->set('codigo', $item['cod']);
                $docente->set('nombre', $item['nombre']);
                $docente->set('ocupacion', $item['idOcupacion']);
                // Detener el bucle después de obtener el primer resultado (siempre y cuando solo se espere uno)
                break;
            }
        }
        // Devolver el objeto Docente
        return $docente;
    }

    function addItem($docente){ // Cambiado a $docente en lugar de $estudiante
        $codigo = $docente->get('codigo');
        $nombre = $docente->get('nombre');
        $ocupacion = $docente->get('ocupacion');
        // Obtener un docente con el mismo código (si existe) utilizando la función getItem
        $registro = $this->getItem($codigo);
        if(isset($registro)){
            return "El código ya existe";
        }
        $sql = "INSERT INTO docentes (cod, nombre, idOcupacion) VALUES ('$codigo', '$nombre', '$ocupacion')";
        $resultSQL = $this->execSql($sql);
        if(empty($resultSQL)){
            return "No se guardó";
        }
        return "Se guardó con éxito";
    }

    function updateItem($docente){ // Cambiado a $docente en lugar de $estudiante
        $codigo = $docente->get('codigo');
        $nombre = $docente->get('nombre');
        $ocupacion = $docente->get('ocupacion');
        // Verificar si el docente con el mismo código existe antes de actualizar
        $registro = $this->getItem($codigo);
        if(!$registro){
            return "El código no existe";
        }
        $sql = "UPDATE docentes SET nombre = '$nombre', idOcupacion = '$ocupacion' WHERE cod = $codigo";
        $resultSQL = $this->execSql($sql);
        if(empty($resultSQL)){
            return "No se actualizó";
        }
        return "Se actualizó con éxito";
    }

    function deleteItem($codigo){
        // Falta implementar la lógica para eliminar un docente de la base de datos
    }
}
?>
