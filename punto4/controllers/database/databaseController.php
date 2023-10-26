<?php
namespace App\controllers\database;

use mysqli;

class DatabaseController{
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PWD = '';
    private $DB_NAME = 'asignaturas2_db';
    private $conx;

    function __construct() {
        $this->conx = new mysqli(
            $this->DB_HOST,
            $this->DB_USER,
            $this->DB_PWD,
            $this->DB_NAME
        );
    }

    function execSql($sql){
        $result = $this->conx->query($sql);
        $this->conx->close();
        return $result;
    }
}
?>