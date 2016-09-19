<?php

class Empleado {

    public $idempleado;
    public $nombre_usu;
    public $pass;
    public $nom;
    public $apellidos;
    public $dpt;
    public $fecha_cont;
    public $ciudad;

    function __construct($nombre_usu, $pass, $nom, $apellidos, $dpt, $fecha_cont, $ciudad) {
        $this->nombre_usu = $nombre_usu;
        $this->pass = $pass;
        $this->nom = $nom;
        $this->apellidos = $apellidos;
        $this->dpt = $dpt;
        $this->fecha_cont = $fecha_cont;
        $this->ciudad = $ciudad;
    }

    public function __toString() {
        return "<td>" . $this->nombre_usu . "</td><td>" . $this->nom . "</td><td>" . $this->apellidos .
        "</td><td>" . $this->dpt;
        //"</td><td><a href='eliminar.php?nombre_usu=$nombre_usu'>eliminar </a></td>";
    }

}
