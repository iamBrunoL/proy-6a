<?php
// Incluir archivo de conexión
require_once 'conexion.php';

// Inicializar variables de error y éxito
$registro_error = "";
$registro_exito = "";

// Verificar si se recibió una solicitud de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener valores del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $username = $_POST["username"];
    $edad = $_POST["edad"];
    $genero = $_POST["genero"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Verificar si las contraseñas coinciden
    if ($password != $confirm_password) {
        $registro_error = "Las contraseñas no coinciden";
    } else {
        // Verificar si el nombre de usuario ya existe en la tabla de usuarios
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
        $stmt->execute([$username]);
        $usuario = $stmt->fetch();

        if ($usuario) {
            // El nombre de usuario ya existe, mostrar mensaje de error
            $registro_error = "El nombre de usuario ya está en uso. Por favor, elija otro.";
        } else {
            // Registrar el usuario en la base de datos
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, correo, direccion, username, edad, genero, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nombre, $apellido, $correo, $direccion, $username, $edad, $genero, $password]);

            // Redirigir al usuario a la página de inicio de sesión
            header("Location: login.php");

            // Iniciar la sesión y mostrar mensaje de éxito
            session_start();
            $_SESSION["success_message"] = "¡Registro exitoso! Inicie sesión para continuar.";
            exit();
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

          <li><a class="getstarted scrollto" href="../aplicacion/login.php">Iniciar Sesión</a></li>
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
          <h2>Registro de usuario</h2>
        </div>

        <div class="row content">
          <div class="col-lg-4">
		  <?php if ($registro_error != "") { ?>
			<div class="alert alert-danger"><?php echo $registro_error; ?></div>
		<?php } ?>

		<?php if ($registro_exito != "") { ?>
			<div class="alert alert-success"><?php echo $registro_exito; ?></div>
		<?php } ?>

		<form method="post">
			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="apellido">Apellido:</label>
				<input type="text" name="apellido" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="correo">Correo electrónico:</label>
				<input type="email" name="correo" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="direccion">Dirección:</label>
				<input type="text" name="direccion" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="username">Nombre de usuario:</label>
				<input type="text" name="username" class="form-control" required>
			</div>


			<div class="form-group"> <br>
    <input type="submit" value="Registrarse" class="btn btn-primary">
</div>
		  </div>




		  <div class="col-lg-4">
			<div class="form-group">
				<label for="edad">Edad:</label>
				<input type="number" name="edad" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="genero">Género:</label>
				<select name="genero" class="form-control" required>
					<option value="">Seleccionar</option>
					<option value="Masculino">Masculino</option>
					<option value="Femenino">Femenino</option>
					<option value="Otro">Otro</option>
				</select>
			</div>

			<div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password" name="password" class="form-control" required>
</div>

<div class="form-group">
    <label for="confirm_password">Confirmar contraseña:</label>
    <input type="password" name="confirm_password" class="form-control" required>
</div>
		  </div>


          <div class="col-lg-4 text-center">
          <img src="../img/registro.jpg" class="img-fluid" alt="">

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
              <li><i class="bx bx-chevron-right"></i> <a href="../aplicacion/login.php">Iniciar sesión</a></li>
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