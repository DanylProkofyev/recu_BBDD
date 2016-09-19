<?php

require_once "Incidencia.php";
require_once "Empleado.php";

class DAOInc {

    private $con;

    public function insInc($inc) {
        if ($this->conectar()) {
            $query = "insert into incidencias values (null, '$inc->incidencia','$inc->estado',"
                    . "'$inc->fecha','$inc->dpt','$inc->creador','$inc->empleado')";
            if (mysqli_query($this->con, $query)) {
                $ok = true;
            } else {
                $ok = false;
            }
            $this->desconectar();
            return $ok;
        } else {
            return FALSE;
        }
    }

    public function selInc($no) {
        if ($this->conectar()) {
            $result = mysqli_query($this->con, "select * from incidencias where creador='$no'");

            $arrayResult = array();
            while ($row = mysqli_fetch_array($result)) {
                $incidencia = $row['incidencia'];
                $estado = $row['estado'];
                $fecha = $row['fecha'];
                $dpt = $row['dpt'];
                $creador = $row['creador'];
                $empleado = $row['empleado'];
                $s = new Incidencia($incidencia, $estado, $fecha, $dpt, $creador, $empleado);
                $arrayResult[] = $s;
            }
        }
        $this->desconectar();
        return $arrayResult;
    }

    public function selIncRe($no) {
        if ($this->conectar()) {
            $result = mysqli_query($this->con, "select * from incidencias where empleado='$no'");

            $arrayResult = array();
            while ($row = mysqli_fetch_array($result)) {
                $incidencia = $row['incidencia'];
                $estado = $row['estado'];
                $fecha = $row['fecha'];
                $dpt = $row['dpt'];
                $creador = $row['creador'];
                $empleado = $row['empleado'];
                $s = new Incidencia($incidencia, $estado, $fecha, $dpt, $creador, $empleado);
                $arrayResult[] = $s;
            }
        }
        $this->desconectar();
        return $arrayResult;
    }

    public function reso($no) {
        if ($this->conectar()) {
            $query = mysqli_query($this->con, "UPDATE `incidencias` SET `estado` = 'resuelto', "
                    . "`fecha` = now() where empleado='$no';");
            if (mysqli_query($this->con, $query)) {
                $ok = true;
            } else {
                $ok = false;
            }
            $this->desconectar();
            return $ok;
        } else {
            return FALSE;
        }
    }

    public function verincdpt($dpt) {
        if ($this->conectar()) {
            $result = mysqli_query($this->con, "select * from incidencias where dpt=$dpt");

            $arrayResult = array();
            while ($row = mysqli_fetch_array($result)) {
                $incidencia = $row['incidencia'];
                $estado = $row['estado'];
                $fecha = $row['fecha'];
                $dpt = $row['dpt'];
                $creador = $row['creador'];
                $empleado = $row['empleado'];
                $s = new Incidencia($incidencia, $estado, $fecha, $dpt, $creador, $empleado);
                $arrayResult[] = $s;
            }
        }
        $this->desconectar();
        return $arrayResult;
    }

    private
            function conectar() {
        $this->con = mysqli_connect("localhost", "root", "", "incidencias");
        if (mysqli_connect_errno()) {
            echo "Error conectar a la bbdd" . mysqli_connect_error() . "<br/>";
            return false;
        }
        return true;
    }

    private
            function desconectar() {
        if (!mysqli_close($this->con)) {
            echo "Error al desconectar " . mysqli_connect_error() . "<br/>";
        }
    }

}
