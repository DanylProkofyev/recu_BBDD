<?php

session_start();
require_once 'DAOEmpl.php';

$nombre_usu = $_SESSION['nombre_usu'];

$miDAO = new DAOempl();
$empleado = $miDAO->pilEmpleado($nombre_usu);


if ($empleado != null) {
    if (!isset($_SESSION['nombre_usu'])) {
        header('Location: index.html');
    } else {
        $nombre_usu = $_SESSION['nombre_usu'];
        if (isset($_POST['modificar'])) {
            $empleado->nom = $_POST['nom'];
            $empleado->apellidos = $_POST['apellidos'];
            $empleado->dpt = $_POST['dpt'];
            $empleado->tipo = $_POST['tipo'];
            $empleado->fecha_cont = $_POST['fecha_cont'];
            $empleado->ciudad = $_POST['ciudad'];
            $empleado->nombre_usu = $nombre_usu;

            if ($miDAO->updatEmpleado($empleado)) {
                echo "empleado modificado<br/>";
            } else {
                echo "El empleado no se ha modificado<br/>";
            }
        }
    }
    echo "<form method='post' action = '" . $_SERVER['PHP_SELF'] . "'> 
        	nombre: <input type='text' name ='nom' value='$empleado->nom'> <br/>
		Apellidos: <input type='text' name ='apellidos' value='$empleado->apellidos'> <br/>
                Ciudad: <input type='text' name ='ciudad' value='$empleado->ciudad'> <br/>
                Fecha de contrato: <input type='date' name='fecha_cont' value='$empleado->fecha_cont'><br/>
                dpt: <input type='number' name='dpt' value='$empleado->dpt'><br/>
                tipo: <input type='number' name='tipo' value='$empleado->tipo'><br/>
                <input type='submit' name='modificar' value='mod'>
		</form>";
}
?>


