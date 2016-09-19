<?php

class Incidencia {

    public $incidencia;
    public $estado;
    public $fecha;
    public $dpt;
    public $creador;
    public $empleado;

    function __construct($incidencia, $estado, $fecha, $dpt, $creador, $empleado) {
        $this->incidencia = $incidencia;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->dpt = $dpt;
        $this->creador = $creador;
        $this->empleado = $empleado;
    }

    public function __toString() {
        return "<td>" . $this->incidencia . "</td><td>" . $this->estado . "</td><td>" . $this->fecha . "</td><td>"
                . $this->dpt . "</td><td>" . $this->empleado . "</td><td><a href='res.php'>resolver</a></td>";
    }

}
