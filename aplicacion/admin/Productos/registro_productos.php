<?php
// Incluir archivo de conexión
require_once '../../conexion.php';


session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de datos de productos</title> 
  
  
  <!-- Favicons -->
  <link href="../../../img/logo.jpg" rel="icon">
  <link href="../../../img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../diseno/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../../diseno/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../diseno/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../../diseno/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../diseno/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<style>
    /* Estilos adicionales */
    body,
    html {
      height: 100%;
    }

    .container-fluid {
      min-height: 100%;
    }

    .sidebar {
      background-color: #f8f9fa;
      padding: 20px;
    }

    .content {
      padding: 20px;
    }

    .footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    /* Animaciones */
    .sidebar,
    .nav-link,
    .footer {
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(-10px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../bienvenidaAdmin.php">
      Ferretería DLC
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ml-auto">
        <span class="navbar-text" style="padding-right: 255px;">
          Bienvenido
        </span>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Contacto
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Contacto/consulta_contacto.php">Consultar msj de contacto</a>
            <a class="dropdown-item" href="../Contacto/modificar_contacto.php">Modificar msj de contacto</a>
            <a class="dropdown-item" href="../Contacto/eliminar_contacto.php">Eliminar msj de contacto</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Compras
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Compras/consulta_compras.php">Consultar compras</a>
            <a class="dropdown-item" href="../Compras/modificar_compras.php">Modificar compras</a>
            <a class="dropdown-item" href="../Compras/eliminar_compras.php">Eliminar compras</a>
            <a class="dropdown-item" href="../../carrito/CompraProductos.php">Agregar compras</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Usuarios
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../Usuarios/consulta_usuarios.php">Consultar usuarios</a>
            <a class="dropdown-item" href="../Usuarios/modificar_usuarios.php">Modificar usuarios</a>
            <a class="dropdown-item" href="../Usuarios/eliminar_usuarios.php">Eliminar usuarios</a>
            <a class="dropdown-item" href="../Usuarios/registro_usuarios.php">Agregar usuarios</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Productos
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="consulta_productos.php">Consultar productos</a>
            <a class="dropdown-item" href="modificar_productos.php">Modificar productos</a>
            <a class="dropdown-item" href="eliminar_productos.php">Eliminar productos</a>
            </div>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="../../cerrar_sesion.php">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid d-flex flex-column">
    <div class="row flex-grow-1">
      <div class="col-md-2 sidebar">
      
      <h2>Contacto</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../Contacto/consulta_contacto.php">Consultar msj de contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Contacto/modificar_contacto.php">Modificar  msj de contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Contacto/eliminar_contacto.php">Eliminar  msj de contacto</a>
          </li>
        </ul>
        <hr>

      
      <h2>Compras</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../Compras/consulta_compras.php">Consultar compras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Compras/modificar_compras.php">Modificar compras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Compras/eliminar_compras.php">Eliminar compras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../carrito/CompraProductos.php">Agregar compras</a>
          </li>
        </ul>
        <hr>

        <h2>Usuarios</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../Usuarios/consulta_usuarios.php">Consultar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Usuarios/modificar_usuarios.php">Modificar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Usuarios/eliminar_usuarios.php">Eliminar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Usuarios/registro_usuarios.php">Agregar usuarios</a>
          </li>
        </ul>
        <hr>
        <h2>Productos</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="consulta_productos.php">Consultar productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="modificar_productos.php">Modificar productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="eliminar_productos.php">Eliminar productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="#" style="color:black;">Agregar productos</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 content">
        
      <h1 class="text-center">Registro de Productos</h1>

      <?php
// Obtener el siguiente ID de la base de datos
$query = "SELECT MAX(id_producto) as max_id FROM productos";
$result = $pdo->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);
$next_id = $row['max_id'] + 1;

// Generar el número de id_img
$id_img = str_pad($next_id, 4, '0', STR_PAD_LEFT);

// Variable para almacenar el mensaje de éxito o error
$message = '';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precio_individual = $_POST['precio_individual'];

    // Insertar los datos en la base de datos
    $query = "INSERT INTO productos (id_producto, nombre_producto, descripcion, stock, precio_individual, id_img) 
              VALUES ('$next_id', '$nombre_producto', '$descripcion', '$stock', '$precio_individual', '$id_img')";
    $result = $pdo->query($query);

    // Verificar si se ha realizado correctamente la inserción
    if ($result) {
        $message = "¡Registro exitoso!";
    } else {
        $message = "Error en el registro";
    }
}
?>


    <form method="post">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $next_id; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="nombre_producto">Nombre del producto:</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control"  id="stock" name="stock" min="0" max="100" step="1" required>
        </div>

        <div class="form-group">
            <label for="precio_individual">Precio:</label>
            <input type="number" class="form-control"  id="precio_individual" name="precio_individual"  min="000" max="9999" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="id_img">ID de imagen:</label>
            <input type="text" class="form-control"  id="id_img" name="id_img" value="<?php echo $id_img; ?>" readonly>
        </div>

        <div class="form-group">
            <input type="submit" value="Registrar producto" class="btn btn-primary">
        </div>

    </form>

    <?php if ($message !== '') { ?>
        <div class="alert alert-<?php echo $result ? 'success' : 'danger'; ?>"><?php echo $message; ?></div>
    <?php } ?>

      </div>
    </div>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <hr>
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Ferretería D.L.C</h3>
            <p>
              Olivares Santana No. 107,<br>
              Ciénega Grande, Asientos,<br>
              Aguascalientes.<br><br>
              <strong style="color: blue;">Teléfono:</strong> 496 143 54 65.<br>
              <strong style="color: blue;">Correo:</strong> mdelunacervantes@yahoo.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Frecuente</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../antecedentes.html">Antecedentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../aplicacion/carrito/CompraProductos.php">Productos</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-3 footer-links">
            <h4>Acerca de</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../contacto.php">Contacto</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../preguntas_frecuentes.html">Preguntas frecuentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../../mision.html">Misión y Visión</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Redes Sociales</h4>
            <p>Para ser avisado o estar informado sobre promociones, síganos en nuestras redes sociales.</p>
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/people/Ferreter%C3%ADa-Dlc/pfbid04ec6Bq2G5VhsQEyVesJRxf4jDZotEPAA1wXJUSScp2hyFBB4Gp77E77SepmbNCqCl/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://wa.link/l31kb3" class="instagram"><i class="bx bxl-whatsapp"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div><br>
  </footer><!-- End Footer -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
