<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenida de Cliente</title> 
  
  
  <!-- Favicons -->
  <link href="../../img/logo.jpg" rel="icon">
  <link href="../../img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../diseno/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../diseno/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../diseno/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../diseno/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../diseno/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  
  <link rel="stylesheet" href="../css/style.css">
  
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
    <a class="navbar-brand" href="#">
      <!-- <img src="logo.png" alt="Logo" height="30"> -->
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
            Datos
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="datos/consulta_datos.php">Consulta datos</a>
            <a class="dropdown-item" href="datos/modificar_datos.php">Modificar datos</a>
            <a class="dropdown-item" href="datos/eliminar_datos.php" class="btn btn-danger">Eliminar datos</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Compras
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="compras/consulta_compras.php">Consultar compras</a>
            <a class="dropdown-item" href="../carrito/CompraProductos.php">Realizar compras</a>
          </div>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="../cerrar_sesion.php">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid d-flex flex-column">
    <div class="row flex-grow-1">
      <div class="col-md-2 sidebar">
        <h2>Datos</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="datos/consulta_datos.php">Consulta datos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="datos/modificar_datos.php">Modificar datos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="datos/eliminar_datos.php" class="btn btn-danger">Eliminar datos</a>
          </li>
        </ul>
        <hr>
        <h2>Compras</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="compras/consulta_compras.php">Consultar compras</a>
          </li>
          <li class="nav-item">
          <a  class="nav-link" href="../carrito/CompraProductos.php">Realizar compras</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10 content">
      <div class="welcome-message">
        <h3>!Hola <strong><?php echo $username?></strong>¡</h3>
      </div>
      <div class="welcome-message">
    <p>¡Gracias por iniciar sesión en nuestra página web!</p>

    <p>En esta página podrás gestionar y administrar todos los aspectos relacionados con tu actividad dentro del sistema web para clientes de la <strong>Ferretería D.L.C</strong> como lo son:</p>
    <li>Consultar tus solicitudes de compra.</li>
    <li>Controlar los datos de tu cuenta.</li>
    <li>Enviar mensajes de contacto.</li>
    <li>Consultar los productos con los que contamos.</li>
    </div>
    
    <div class="welcome-message">
    <p>Recuerda que en nuestra ferretería encontrarás una amplia selección de herramientas, materiales de construcción y mucho más. Si necesitas ayuda o tienes alguna pregunta, no dudes en contactarnos.</p>
    <p>¡Disfruta de tu experiencia de compra!</p>
  </div>

        <?php
    // Verificar si se ha enviado el formulario de eliminación de usuario
    if (isset($_POST['eliminar'])) {
        eliminar_usuario();
    }

    // Función para eliminar los datos del usuario y cerrar sesión
    function eliminar_usuario() {
        global $conn;
        session_start();

        // Eliminar los datos del usuario de la base de datos
        $sql = "DELETE FROM usuarios WHERE username='$username'";
        if ($conn->query($sql) === TRUE) {
            // Cerrar la sesión
            session_destroy();

            // Redirigir a la página de inicio de sesión
            header("Location: login.php");
            exit;
        } else {
            echo "Error al eliminar los datos del usuario: " . $conn->error;
        }
    }
    ?>
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
              <li><i class="bx bx-chevron-right"></i> <a href="../../antecedentes.html">Antecedentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../aplicacion/carrito/CompraProductos.php">Productos</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-3 footer-links">
            <h4>Acerca de</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../../contacto.php">Contacto</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../preguntas_frecuentes.html">Preguntas frecuentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../mision.html">Misión y Visión</a></li>
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