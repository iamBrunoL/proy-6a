

<?php
// Incluir archivo de conexión
require_once 'conexion.php';


// Definir variables y errores de inicio de sesión
$username = $password = "";
$username_err = $password_err = "";
$login_err = "";

// Procesar datos del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar el nombre de usuario
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese su nombre de usuario.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validar la contraseña
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingrese su contraseña.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Verificar si los datos de inicio de sesión son válidos
    if (empty($username_err) && empty($password_err)) {
        if (iniciar_sesion($username, $password)) {
            exit;
        } else {
            $login_err = "<p style='color:red; margin:15px;'>Nombre de usuario o contraseña incorrectos.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inicio de Sesión</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<!-- Favicons -->
<link href="../img/logo.jpg" rel="icon">
  <link href="../img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../diseno/vendor/aos/aos.css" rel="stylesheet">
  <link href="../diseno/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../diseno/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../diseno/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../diseno/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../diseno/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../diseno/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../diseno/css/style.css" rel="stylesheet">
</head>

<body>
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="../index.html">Ferretería DLC</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="diseno/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href="#"><span>Acerca de</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="../antecedentes.html">Antecedentes</a></li>
              <li><a class="nav-link scrollto" href="../mision.html">Misión y Visión</a></li>
              <li><a class="nav-link scrollto" href="../preguntas_frecuentes.html">Preguntas Frecuentes</a></li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="../aplicacion/carrito/muestraProductos.php">Productos</a></li>
          <li><a class="nav-link scrollto" href="../contacto.php">Contacto</a></li>

          <li><a class="getstartedR scrollto" href="../aplicacion/registro.php">Registrarse</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->



  <main id="main"style="margin-top:25px;">
    <!-- ======= About Us Section ======= -->
    <section id="#" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Iniciar sesión</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label>Nombre de usuario</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Contraseña</label>
                                <input type="password" name="password" class="form-control">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                            </div>
                            <span class="help-block text-center"><?php echo $login_err; ?></span>
                        </form>
                        
                        <p class="text-center">¿No tienes una cuenta? <a href="registro.php" style="color: blue;">Regístrate aquí</a>.</p>
                    </div>
          <div class="col-lg-6 text-center">
          <img src="../img/login2.png" class="img-fluid" style="max-width: 75%; border-radius:20px;">
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="../antecedentes.html">Antecedentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../aplicacion/carrito/MuestraProductos.php">Productos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../aplicacion/registro.php">Registrarse</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-3 footer-links">
            <h4>Acerca de</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../contacto.php">Contacto</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../preguntas_frecuentes.html">Preguntas frecuentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../mision.html">Misión y Visión</a></li>
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
  <script src="../diseno/vendor/aos/aos.js"></script>
  <script src="../diseno/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../diseno/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../diseno/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../diseno/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../diseno/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="../diseno/js/main.js"></script>

</body>

</html>
