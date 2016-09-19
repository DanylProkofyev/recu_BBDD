<?php

session_start();
$nomb = $_SESSION['nombre_usu'];
require_once 'DAOEmpl.php';
require_once 'DAOInc.php';
require_once 'Incidencia.php';
$miDAO = new DAOEmpl();
if (isset($_POST['enviar'])) {
    $incidencia = $_POST['incidencia'];
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];
    $dpt = $_POST['departamento'];
    $nom = $_POST['nom'];
    $inc = new Incidencia($incidencia, $estado, $fecha, $dpt, $nomb, $nom);
    $mDAO = new DAOInc();
    if ($mDAO->insInc($inc)) {
        echo 'incidencia creada <br/>';
    } else {
        echo "incidencia no creada";
        print_r($inc);
    }
} else {
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>
        Incidencia: <input type='text' name='incidencia' required/><br/>
        Estado: <input type='text' name='estado' required/><br/>
	Fecha: <input type='date' name='fecha' required/><br/>
	Departamento: <input type='number' name='departamento' required/><br/>";
    echo "Empleado a resolver: <select name='nom'>";
    $miDAO->sel();
    echo "</select><br/>";
    echo "<input type='submit' name='enviar' value='registrarse'></form><br/>";
}
