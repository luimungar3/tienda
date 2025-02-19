<?php

$servername = "localhost";
$database = "tienda";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nombre = $_POST["nom_usu"];
$pass = $_POST["contrasena"];


$query = mysqli_query($conn, "SELECT * FROM admin WHERE usuario = '".$nombre."' AND password = '".$pass."'");
$nr = mysqli_num_rows($query);

if ($nr == 1) {
    session_start();
    $_SESSION["usuario"] = $nombre;
    header("Location: inicio.php");
}
else if ($nr == 0)
{
    echo "El usuario no existe";
}

?>