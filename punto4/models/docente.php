<?php

namespace App\models;

class Docente{
    private $codigo;
    private $nombre;
    private $idOcupacion;
    private $cod; 
    private $ocup;

    function get($prop){
        return $this->$prop;
    }

    function set($prop, $value){
        $this->$prop = $value;
    }
}
