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

$nombre = $_POST["nom_usu"];
$pass = $_POST["contrasena"];


$query = mysqli_query($conn, "SELECT * FROM clientes WHERE nombre_usuario = '".$nombre."' AND clave = '".$pass."'");
$nr = mysqli_num_rows($query);

if ($nr == 1) {
    session_start();
    $_SESSION["usuario"] = $nombre;
    header("Location: sesion_iniciada.php");
}
else if ($nr == 0)
{
    echo "El usuario no existe";
}

?>