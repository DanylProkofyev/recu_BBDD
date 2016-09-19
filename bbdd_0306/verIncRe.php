<?php

session_start();
require_once 'Incidencia.php';
require_once 'DAOInc.php';
$no = $_SESSION['nombre_usu'];
$miDAO = new DAOInc();
$incidencias = $miDAO->selIncRe($no);

if ($incidencias) {
    echo"<table border=2><th>Incidencia</th><th>Estado</th><th>Fecha</th>"
    . "<th>Departamento</th></th><th>encargado</th><th>resolver</th>";
    foreach ($incidencias as $s) {
        echo "<tr>" . $s;
        echo "</tr>";
    }
    echo "</table>";
}
?>
