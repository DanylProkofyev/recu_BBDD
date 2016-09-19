<?php

session_start();
$dpt=$_SESSION['dpt'];
$nomb = $_SESSION['nombre_usu'];
require_once 'DAOEmpl.php';
require_once 'DAOInc.php';
require_once 'Incidencia.php';
$miDAO = new DAOEmpl();
$miDAO->verincdpt($dpt);


