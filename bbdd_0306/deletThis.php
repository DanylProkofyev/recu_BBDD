<?php

require_once 'Empleado.php';
require_once 'DAOEmpl.php';
$miDAO = new DAOEmpl();
if (isset($_POST['eliminar'])) {
    $nombre_usu = $_POST['nombre_usu'];
    $pass = $_POST['pass'];
} else {
    echo "Eliminar concierto:";?>
<form method='post' action='<?php $_SERVER['PHP_SELF'] ?>'>
    <?php
    echo "<select name='idconcierto'>";
    while ($fila = mysqli_fetch_array($resultado)) {
        extract($fila);
        echo "<option value='$nombre_usu'>$nombre, $fecha</option>";
    }
    echo "</select><br/>";
    echo "<input type='submit' name='eliminar' value='eliminar'>";
    }
?>