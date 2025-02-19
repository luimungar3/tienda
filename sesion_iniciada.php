<?php
session_start();
// Verificar si la sesión está iniciada
if (isset($_SESSION['usuario'])) {
    // La sesión está iniciada, puedes continuar con el resto del código
    $servername = "localhost";
    $database = "tienda";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("La conexión falló: " . mysqli_connect_error());
    }

    $sql = "SELECT id_libro, titulo, precio, foto FROM libros";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id_libro'];
        $titulo = $row['titulo'];
        $ruta = $row['foto'];
        $precio = $row['precio'];
        // Aquí puedes procesar los datos como lo necesites
    }

    mysqli_close($conn);
} else {
    // La sesión no está iniciada, redirigir o realizar alguna acción
    header("Location: inicio_sesion.html");
    exit();
}
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
            <a href="#" class="btn btn-secondary">Carrito</a>
            <a href="cerrar_session.php" class="btn btn-primary">Cerrar sesion</a>
        </div>
      </div>
    </div>
  </header>


  <main>
        <div class="container">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-6">
                <?php foreach ($result as $row) { ?>
                    <div class="col me-5">
                        <div class="card shadow-sm">
                            <?php
                            $imagen=$row['foto'];
                            if(!file_exists($imagen)) {
                                $imagen="imagenes/nophoto.jpg";
                            }
                            ?>
                            <img src="<?php echo $imagen; ?>" class="card-img-top custom-card-img" alt="Imagen del libro">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['titulo']; ?></h5>
                                <p class="card-text"><?php echo number_format($row['precio'],2 ,',','.') . '€'?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="detalles.php?id=<?php echo $row['id_libro']?>" class="btn btn-primary">Detalles</a>
                                    </div>
                                    <button type="button" class="btn btn-success">Comprar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
</body>

</html>