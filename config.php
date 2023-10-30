<?php

$servidor = "localhost";
$usuario = "root";
$contra = "";
$bd = "lospolloshermanos";

$db = mysqli_connect($servidor, $usuario, $contra, $bd);

if (!$db)
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
