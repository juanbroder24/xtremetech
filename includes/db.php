<?php
//session_start();
$servername = "localhost"; 
$username = "xtremetech_admin";
$password = "#Ju85Ma17#";
$dbname = "xtremetech_nights";

// Crear la conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexion
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);}
else 
   // {echo "Conexion exitosa";}

//$conn->close();
?>