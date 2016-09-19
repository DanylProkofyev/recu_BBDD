<?php

require_once 'Empleado.php';
require_once 'DAOEmpl.php';

$miDAO = new DAOEmpl();
$empleados = $miDAO->selectallempl();
if ($empleados) {
echo"<table border=2><th>nombre_usu</th><th>pass</th><th>nom</th><th>dpt</th>";
//    . "<td><a href=''></a></td><td><a href=''></a></td>";
    foreach ($empleados as $s) {
        echo "<tr>".$s."</tr>";
    }
    echo "</table>";
}
//semper invicta
?>
<a href="crearUsr.php">crear usu</a>
<a href="deletUsr.php">delete usu</a>
