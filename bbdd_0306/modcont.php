<?php

session_start();
require_once 'DAOEmpl.php';

$nombre_usu = $_SESSION['nombre_usu'];
$miDAO = new DAOempl();
$om = $miDAO->selcont($nombre_usu);
$e = $miDAO->pilEmpleado($nombre_usu);
if ($e != null) {
    if (!isset($_SESSION['nombre_usu'])) {
        header('Location: index.html');
    } else {
        if (isset($_POST['modificar'])) {
            $comp = $_POST['comp'];
            $contra = $_POST['contra'];
            $contra1 = $_POST['contra1'];
            $e->pass = $_POST['contra'];
            if ($om == $comp && $contra == $contra1) {
                if ($miDAO->updatPass($e)) {
                    echo "empleado modificado<br/>";
                } else {
                    echo "El empleado no se ha modificado<br/>";
                }
            } else if ($om != $comp) {
                echo "contraseña actual mal introducida";
            } else {
                echo 'contraseña no coincide';
            }
        } else {
            echo "<form method='post' action = '" . $_SERVER['PHP_SELF'] . "'> 
        	contraseña actual: <input type='text' name ='comp'> <br/>
        	nueva contraseña: <input type='text' name ='contra'> <br/>
        	verificar contraseña: <input type='text' name ='contra1'> <br/>
        	<input type='submit' name='modificar' value='mod'>
        	</form>";
        }
    }
}
?>