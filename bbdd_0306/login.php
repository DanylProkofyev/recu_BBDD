<?php

session_start();
require_once 'DAOEmpl.php';
$nombre_usu = $_POST['nombre_usu'];
$pass = $_POST['pass'];

$miDAO = new DAOEmpl();
$no = $miDAO->validarEmpleado($nombre_usu, $pass);
if ($no != null) {
    if ($no == "admin") {
        $_SESSION['nombre_usu'] = $nombre_usu;
        header("refresh:0;url=admin.php");
    } else if (preg_match("/gerente/i",$no)) {
        $_SESSION['nombre_usu'] = $nombre_usu;
        header("refresh:0;url=gerente.html");
    } else {
        $_SESSION['nombre_usu'] = $nombre_usu;
        header("refresh:0;url=empleado.html");
    }
} else {
    echo 'Usuario o pass incorrecto';
}
?>

