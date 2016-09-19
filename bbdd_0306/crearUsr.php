<?php

require_once 'Empleado.php';
require_once 'DAOEmpl.php';

if (isset($_POST['enviar'])) {
    $nombre_usu = $_POST['nombre_usu'];
    $pass = $_POST['pass'];
    $nom = $_POST['nom'];
    $apellidos = $_POST['apellidos'];
    $dpt = $_POST['dpt'];
    $ciudad = $_POST['ciudad'];
    $fecha_cont= $_POST['fecha_cont'];

    $empl = new Empleado($nombre_usu, $pass, $nom, $apellidos, $dpt, $ciudad,$fecha_cont);

    $miDAO = new DAOEmpl();
    if ($miDAO->insertEmp($empl)) {
        echo 'empleado dado de alta <br/>';
    } else {
        echo "empleado no se ha dado de alta";
    }
} else {
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>
        Nombre_usu: <input type='text' name='nombre_usu' required/><br/>
        Pass usuario: <input type='password' name='pass' required/><br/>
	Nombre: <input type='text' name='nom' required/><br/>
	Apellidos: <input type='text' name='apellidos' required/><br/>
        dpt: <input type='number' name='dpt' required/><br/>
        ciudad:<input type='text' name='ciudad' required/><br/>
        fecha cont: <input type='date' name='fecha_cont' required/><br/>
        <input type='submit' name='enviar' value='registrarse'></form><br/>";
}
?>
