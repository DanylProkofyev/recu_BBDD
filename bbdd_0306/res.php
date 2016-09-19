<?php

session_start();
require_once 'Incidencia.php';
require_once 'DAOInc.php';
$no = $_SESSION['nombre_usu'];
$miDAO = new DAOInc();
$incidencias = $miDAO->selIncRe($no);
$resol=$miDAO->reso($no);
if ($resol) {
    echo "resuelto<br/>";
} else {
    echo "no resuelto<br/>";
}
?>

