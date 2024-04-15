
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
  <title>Consulta de datos</title> 

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
    <a class="navbar-brand" href="../bienvenidaCliente.php">
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
            
            <a class="dropdown-item" href="modificar_datos.php">Modificar datos</a>
            <a class="dropdown-item" href="eliminar_datos.php" class="btn btn-danger">Eliminar datos</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="padding-right: 25px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Compras
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../compras/consulta_compras.php">Consultar compras</a>
            <a class="dropdown-item" href="../../carrito/CompraProductos.php">Realizar compras</a>
          </div>
        </li>

        <li class="nav-item active">
        <a class="nav-link" href="../../cerrar_sesion.php">Cerrar sesión</a>        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid d-flex flex-column">
    <div class="row flex-grow-1">
      <div class="col-md-2 sidebar">
        <h2>Datos</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#"  style="color:black;">Consulta datos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="modificar_datos.php">Modificar datos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="eliminar_datos.php" class="btn btn-danger">Eliminar datos</a>
          </li>
        </ul>
        <hr>
        <h2>Compras</h2>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../compras/consulta_compras.php">Consultar compras</a>
          </li>
          <li class="nav-item">
          <a  class="nav-link" href="../../carrito/CompraProductos.php">Realizar compras</a>          </li>
        </ul>
      </div>
      <div class="col-md-10 content">
      <h1 class="text-center">Datos del perfil</h1>

        <?php
		if ($_SESSION) { // Verificar si hay una sesión iniciada
			$username = $_SESSION['username']; // Obtener el nombre de usuario de la sesión iniciada
			$sql = "SELECT * FROM usuarios WHERE username='$username'"; // Consulta SQL para obtener los datos del usuario
			$result = $conexion->query($sql); // Ejecutar la consulta SQL
			if ($result->num_rows == 1) { // Verificar si se encontró un registro
				$row = $result->fetch_assoc(); // Obtener los datos del usuario como un arreglo asociativo
				?>
				<div class="card mt-4">
					<div class="card-body">
						<h5 class="card-title">Datos personales</h5>
						<p class="card-text"><strong>ID:</strong> <?php echo $row['id']; ?></p>
						<p class="card-text"><strong>Nombre:</strong> <?php echo $row['nombre']; ?></p>
						<p class="card-text"><strong>Apellido:</strong> <?php echo $row['apellido']; ?></p>
						<p class="card-text"><strong>Correo:</strong> <?php echo $row['correo']; ?></p>
						<p class="card-text"><strong>Dirección:</strong> <?php echo $row['direccion']; ?></p>
						<p class="card-text"><strong>Nombre de usuario:</strong> <?php echo $row['username']; ?></p>
						<p class="card-text"><strong>Edad:</strong> <?php echo $row['edad']; ?></p>
						<p class="card-text"><strong>Género:</strong> <?php echo $row['genero']; ?></p>
						<p class="card-text"><strong>Contraseña:</strong> <?php echo $row['contrasena']; ?></p>
					</div>
				</div>
				<?php
			} else {
				echo "<p class='alert alert-danger'>No se encontró ningún registro.</p>";
			}
		} else {
			echo "<p class='alert alert-danger'>Debe iniciar sesión para ver sus datos.</p>";
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