<?php

$servername = "localhost";
$database = "tienda";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$nombre_usuario=$_POST['nom_usu'];
$clave=$_POST['contrasena'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];

$insert = "INSERT INTO clientes (nombre, apellidos,nombre_usuario, clave, correo,  telefono) 
VALUES ('$nombre', '$apellidos','$nombre_usuario', '$clave','$correo',$telefono)";

if ($conn->query($insert) == TRUE) {
    header("Location: inicio_sesion.html");
} else {
    echo "Error al crear el usuario";
}

?>