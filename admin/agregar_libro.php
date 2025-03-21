<?php
$servername = "localhost";
$database = "tienda";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Operación para agregar un nuevo libro
if (isset($_POST['agregar'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $foto = $_POST['foto'];
    $precio = $_POST['precio'];

    $insertQuery = "INSERT INTO libros (titulo, descripcion, foto, precio) VALUES ('$titulo', '$descripcion', '$foto', '$precio')";
    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo("Libro agregado con éxito");
    } else {
        echo("Error al agregar el libro");
    }
}
?>

<!-- Código HTML para la página de agregar_libro.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LibroShop Admin - Agregar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="admin.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="inicio.php">LibroShop Admin</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <main>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Opciones Administración
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="agregar_libro.php">Agregar Libro</a>
                                <a class="nav-link" href="borrar_libro.php">Borrar Libro</a>
                                <a class="nav-link" href="editar_libro.php">Editar Libro</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid px-4">
                    <h1 class="mt-4">Opciones Administración</h1>
                        <ol class="breadcrumb mb-4">
                            <li></li>
                        </ol>
                    <div class="mb-3">
                        <h2>Agregar Libro</h2>
                        <form method="post">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">URL de la Foto</label>
                                <input type="text" class="form-control" id="foto" name="foto" required>
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="agregar">Agregar Libro</button>
                        </form>
                    </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</body>
</html>