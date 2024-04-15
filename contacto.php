<?php
// Incluir archivo de conexión
require_once 'aplicacion/conexion.php';

$fecha = date('Y-m-d');

// Obtener el siguiente ID de la base de datos
$query = "SELECT MAX(id) as max_id FROM contacto";
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
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Insertar los datos en la base de datos
    $query = "INSERT INTO contacto (usuario, email, mensaje, fecha) 
              VALUES ('$usuario', '$email', '$mensaje','$fecha')";
    $result = $pdo->query($query);

    // Verificar si se ha realizado correctamente la inserción
    if ($result) {
        $message = "Comentario enviado con éxito!";
    } else {
        $message = "Error en el envio";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contacto</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logo.jpg" rel="icon">
  <link href="img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="diseno/vendor/aos/aos.css" rel="stylesheet">
  <link href="diseno/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="diseno/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="diseno/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="diseno/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="diseno/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="diseno/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="diseno/css/style.css" rel="stylesheet">
</head>

<body>
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Ferretería DLC</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="diseno/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href="#"><span>Acerca de</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="antecedentes.html">Antecedentes</a></li>
              <li><a class="nav-link scrollto" href="mision.html">Misión y Visión</a></li>
              <li><a class="nav-link scrollto" href="preguntas_frecuentes.html">Preguntas Frecuentes</a></li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="aplicacion/carrito/muestraProductos.php">Productos</a></li>

          <li><a class="getstarted scrollto" href="aplicacion/login.php">Iniciar Sesión</a></li>
          <li><a class="getstartedR scrollto" href="aplicacion/registro.php">Registrarse</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->


  <main id="main"style="margin-top:25px;">

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2>
          <p>
          Recuerda que en <strong>Ferretería D.L.C.</strong> estamos comprometidos en brindarte una atención rápida y eficiente.
          Nos encantaría escucharte y responder cualquier consulta o inquietud que puedas tener. Nuestro equipo de atención al cliente está listo para brindarte asistencia personalizada. ¡Esperamos poder ayudarte pronto!
          </p>
        </div>

        <div class="row">
        <?php if ($message !== '') { ?>
        <div style="margin-top:8px; text-align:center; col-lg-12" class="alert alert-<?php echo $result ? 'success' : 'danger'; ?>"><?php echo $message; ?></div>
    <?php } ?>
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Dirección:</h4>
                <p>Olivares Santana No. 107, Ciénega Grande, Asientos, Aguascalientes.
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Correo:</h4>
                <p>mdelunacervantes@yahoo.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Teléfono:</h4>
                <p>496 143 54 65.</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d230.88967058510073!2d-102.01808719270039!3d22.1931841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8681fe3657a4df93%3A0xec6cf6fd931e2d63!2sOlivares%20Santana%20107%2C%20Los%20Encinos%2C%2020722%20Ci%C3%A9nega%20Grande%2C%20Ags.!5e0!3m2!1ses!2smx!4v1687212107278!5m2!1ses!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            
            <form method="post"  class="php-email-form">
			
            <h1 class="text-center">Registro de Productos</h1>
        <div class="form-group">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="mensaje">Comentario, duda, sugerencia:</label>
            <textarea type="text" class="form-control" id="mensaje" name="mensaje" required cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Enviar comentario" class="btn btn-primary">
        </div>

    </form>

          </div>

         
        </div>

      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->





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
              <li><i class="bx bx-chevron-right"></i> <a href="antecedentes.html">Antecedentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="aplicacion/carrito/MuestraProductos.php">Productos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="aplicacion/registro.php">Registrarse</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-3 footer-links">
            <h4>Acerca de</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="preguntas_frecuentes.html">Preguntas frecuentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="mision.html">Misión y Visión</a></li>
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




  <!-- Vendor JS Files -->
  <script src="diseno/vendor/aos/aos.js"></script>
  <script src="diseno/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="diseno/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="diseno/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="diseno/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="diseno/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="diseno/js/main.js"></script>

</body>

</html>