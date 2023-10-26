<?php
namespace App\controllers\estudiantes;

use App\controllers\EntityController;
use App\models\Estudiante;

class EstudianteController extends EntityController {

    function allData(){
        // Consulta SQL para seleccionar todos los registros de estudiantes
        $sql = "select * from estudiantes";
        // Ejecutar la consulta SQL usando el método execSql del controlador base
        $resultSQL = $this->execSql($sql);
        $lista = [];
        // Verificar si se obtuvieron resultados de la consulta
        if($resultSQL->num_rows > 0){
            while($item = $resultSQL->fetch_assoc()){
                // Crear un objeto Estudiante y asignarle los datos obtenidos de la base de datos
                $estudiante = new Estudiante();
                $estudiante ->set('codigo', $item['codigo']);
                $estudiante ->set('nombre', $item['nombre']);
                $estudiante ->set('email', $item['email']);
                // Agregar el objeto Estudiante a la lista
                array_push($lista, $estudiante);
            }
        }
        // Devolver la lista de estudiantes
        return $lista;
    }

    function getItem($codigo){
        // Consulta SQL para seleccionar un estudiante específico por código
        $sql = "select * from estudiantes where codigo=".$codigo;
        // Ejecutar la consulta SQL usando el método execSql del controlador base
        $resultSQL = $this->execSql($sql);
        $estudiante = null;
        // Verificar si se obtuvieron resultados de la consulta
        if($resultSQL->num_rows > 0){
            while($item = $resultSQL->fetch_assoc()){
                // Crear un objeto Estudiante y asignarle los datos obtenidos de la base de datos
                $estudiante = new Estudiante();
                $estudiante->set('codigo', $item['codigo']);
                $estudiante->set('nombre', $item['nombre']);
                $estudiante->set('email', $item['email']);
                // Detener el bucle después de obtener el primer resultado (siempre y cuando solo se espere uno)
                break;
            }
        }
        // Devolver el objeto Estudiante
        return $estudiante;
    }

    function addItem($estudiante){
        $codigo = $estudiante->get('codigo');
        $nombre = $estudiante->get('nombre');
        $email = $estudiante->get('email');
        // Obtener un estudiante con el mismo código (si existe) utilizando la función getItem
        $registro = $this->getItem($codigo);
        // Aquí falta la lógica para agregar un estudiante si no existe y manejar el caso si ya existe
        if(isset($registro)){
            return "El codigo ya existe";
        }
        $sql = "Insert into estudiante (codigo,nombre,email)value('$codigo$,'$nombre','$email')";
        $resultSQL = $this->execSql($sql);
        if(empty($resultSQL)){
            return "nose guardo";
        }
        return "se guardo con exito"; 
    }

    function updateItem($estudiante){
        $codigo = $estudiante->get('codigo');
        $nombre = $estudiante->get('nombre');
        $email = $estudiante->get('email');
        // Obtener un estudiante con el mismo código (si existe) utilizando la función getItem
        $registro = $this->getItem($codigo);
        // Aquí falta la lógica para agregar un estudiante si no existe y manejar el caso si ya existe
        if(isset($registro)){
            return "El codigo ya existe";
        }
        $sql = "update estudiante set ";
        $sql .= "nombre = $nombre,";
        $sql .= "email = $email,";
        $sql .= "where codigo = $codigo";


        $resultSQL = $this->execSql($sql);
        if(empty($resultSQL)){
            return "nose guardo";
        }
        return "se guardo con exito";
    }

    function deleteItem($codigo){
        // Falta implementar la lógica para eliminar un estudiante de la base de datos
    }
}
?>
