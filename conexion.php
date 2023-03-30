<?php

#Variables de Conexion a BD
$servername = "localhost";
$database = "pruebabd";
$username = "root";
$password = "root";

#Se realiza conexion a la BD
$conn = mysqli_connect($servername, $username, $password, $database);

#En caso de existir error en la conexion se muestra error en pantalla
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>