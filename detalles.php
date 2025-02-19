<?php
$servername = "localhost";
$database = "tienda";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("La conexión falló: " . mysqli_connect_error());
}

$id_libro = isset($_GET['id']) ? $_GET['id'] : null;

$sql = "SELECT id_libro, titulo, precio,foto,descripcion FROM libros where id_libro = $id_libro";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id_libro'];
    $titulo = $row['titulo'];
    $ruta= $row['foto'];
    $precio = $row['precio'];
    $descripcion=$row['descripcion'];
}
mysqli_close($conn);
?>

<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LibroShop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="estilos2.css">
</head>

<body>
  <header>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a href="#" class="navbar-brand">
          <strong>LibroShop</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarHeader">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
            </ul>
        </div>
      </div>
    </div>
  </header>


  <main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-1 mt-md-10">
                <?php
                $imagen = $ruta;
                if (!file_exists($imagen)) {
                    $imagen = "imagenes/nophoto.jpg";
                }
                ?>
                <img src="<?php echo $imagen; ?>" class="card-img-top custom-card-img detalles-img" alt="Imagen del libro">
            </div>
            <div class="col-md-6 order-md-4 mt-4 mt-md-50">
                <h1 class="card-title"><?php echo $titulo; ?></h1>
                <h3 class="card-text"><?php echo number_format($precio, 2, ',', '.') . '€' ?></h3>
                <p class="lead">
                    <?php echo $descripcion ?>
                </p>
                
            </div>

        </div>
    </div>
</main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>