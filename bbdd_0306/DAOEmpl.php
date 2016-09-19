<?php

require_once 'Empleado.php';

class DAOEmpl
{

    private $con;

    public function sel($nomb)
    {
        if ($this->conectar()) {
            $result = mysqli_query($this->con, "select nombre_usu, idempleado from empleado 
where nombre_usu!='$nomb';");
            $arrayResult = array();
            while ($row = mysqli_fetch_array($result)) {
                $idempleado = $row['idempleado'];
                $nombre_usu = $row['nombre_usu'];

                $s = new Empleado($idempleado, $nombre_usu, "", "", "", "", "", "", "");
                $arrayResult[] = $s;
                while ($fila = mysqli_fetch_array($result)) {
                    extract($fila);
                    echo "<option value = '$nombre_usu' > $nombre_usu</option>";
                }
            }
        }
        $this->desconectar();
    }

    public function validarEmpleado($nombre_usu, $pass)
    {
        if ($this->conectar()) {
            $result = mysqli_query($this->con, "select nombre_usu, pass from empleado where nombre_usu='$nombre_usu' and pass='$pass'");
            $this->desconectar();
            if ($result) {
                return $nombre_usu;
            }
        } else {
            return null;
        }
    }

    public function insertEmp($s)
    {
        if ($this->conectar()) {
            $query = "insert into empleado values ('$s->nombre_usu','$s->pass',"
                . "'$s->nom','$s->apellidos','$s->dpt','$s->fecha_cont','$s->ciudad')";
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

    public function selectallempl()
    {
        if ($this->conectar()) {
            $result = mysqli_query($this->con, "select * from empleado");

            $arrayResult = array();
            while ($row = mysqli_fetch_array($result)) {
                $nombre_usu = $row['nombre_usu'];
                $pass = $row['pass'];
                $nom = $row['nom'];
                $apellidos = $row['apellidos'];
                $dpt = $row['dpt'];
                $fecha_cont = $row['fecha_cont'];
                $ciudad = $row['ciudad'];

                $s = new Empleado($nombre_usu, $pass, $nom, $apellidos, $dpt, $fecha_cont, $ciudad);
                $arrayResult[] = $s;
            }
        }
        $this->desconectar();
        return $arrayResult;
    }

    public function pilEmpleado($nombre_usu)
    {
        if ($this->conectar()) {
            $result = mysqli_query($this->con, "select * from empleado where nombre_usu='$nombre_usu'");
            if ($row = mysqli_fetch_array($result)) {
                $pass = $row['pass'];
                $nom = $row['nom'];
                $apellidos = $row['apellidos'];
                $dpt = $row['dpt'];
                $fecha_cont = $row['fecha_cont'];
                $ciudad = $row['ciudad'];

                $e = new Empleado("", $nombre_usu, $pass, $nom, $apellidos, $dpt, $ciudad, $fecha_cont);
            } else {
                $e = null;
            }
            $this->desconectar();
            return $e;
        } else {
            return null;
        }
    }

    public function selcont($nombre_usu)
    {
        if ($this->conectar()) {
            $result = mysqli_query($this->con, "select pass from empleado where nombre_usu='$nombre_usu'");
            if ($row = mysqli_fetch_array($result)) {
                $pass = $row['pass'];
            } else {
                $ok = null;
            }
            $this->desconectar();
            return $pass;
        } else {
            return false;
        }
    }

    public function updatEmpleado($empleado)
    {
        if ($this->conectar()) {
            $query = "update empleado set nom='$empleado->nom', apellidos='$empleado->apellidos', 
              fecha_cont='$empleado->fecha_cont',"
                . " ciudad='$empleado->ciudad' where nombre_usu='$empleado->nombre_usu'";
            if (mysqli_query($this->con, $query)) {
                $ok = true;
            } else {
                $ok = false;
            }
            $this->desconectar();
            return $ok;
        } else {
            return false;
        }
    }

    public function updatPass($e)
    {
        if ($this->conectar()) {
            $query = "update empleado set pass='$e->pass' where nombre_usu='$e->nombre_usu'";
            if (mysqli_query($this->con, $query)) {
                $ok = true;
            } else {
                $ok = false;
            }
            $this->desconectar();
            return $ok;
        } else {
            return false;
        }
    }

    public function deletThis($pass, $nombre_usu)
    {
        if ($this->conectar()) {
            $query = "delete from empleado where pass='$pass' and nombre_usu='$nombre_usu'";
            if (mysqli_query($this->con, $query)) {
                $ok = true;
            } else {
                $ok = false;
            }
            $this->desconectar();
            return $ok;
        } else {
            return false;
        }
    }

    private
    function conectar()
    {
        $this->con = mysqli_connect("localhost", "root", "", "incidencias");
        if (mysqli_connect_errno()) {
            echo "Error conectar a la bbdd" . mysqli_connect_error() . "<br/>";
            return false;
        }
        return true;
    }

//funcion para cerrar la conexion
    private
    function desconectar()
    {
        if (!mysqli_close($this->con)) {
            echo "Error al desconectar " . mysqli_connect_error() . "<br/>";
        }
    }

}
