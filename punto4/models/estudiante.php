<?php

namespace App\models;

class Estudiante{
    private $codigo;
    private $nombre;
    private $email; 

    function get($prop){
        return $this->$prop;
    }

    function set($prop, $value){
        $this->$prop = $value;
    }
}
