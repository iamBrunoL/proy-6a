<?php session_start();
include ("../conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Muestra de productos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  
  <!-- Favicons -->
  <link href="../../img/logo.jpg" rel="icon">
  <link href="../../img/logo.jpg" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../diseno/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../diseno/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../diseno/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../diseno/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../diseno/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../diseno/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../diseno/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../diseno/css/style.css" rel="stylesheet">
</head>

<body>

  
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="../../index.html">Ferretería DLC</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="diseno/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href="#"><span>Acerca de</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="../../antecedentes.html">Antecedentes</a></li>
              <li><a class="nav-link scrollto" href="../../mision.html">Misión y Visión</a></li>
              <li><a class="nav-link scrollto" href="../../preguntas_frecuentes.html">Preguntas Frecuentes</a></li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="../../contacto.php">Contacto</a></li>

          <li><a class="getstarted scrollto" href="../../aplicacion/login.php">Iniciar Sesión</a></li>
          
          <li><a class="getstartedR scrollto" href="../../aplicacion/registro.php">Registrarse</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->




  <main id="main" style="margin-top:25px;">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">



    

<!-- ======= Marcas Section ======= -->
<section id="clients" class="clients section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Marcas asociadas</h2>
          <p>
          En nuestra ferretería, nos enorgullece trabajar con las mejores marcas del mercado para ofrecerte productos de calidad y confianza. Colaboramos estrechamente con reconocidas marcas del sector de la construcción y el mejoramiento del hogar. Nuestro amplio catálogo incluye una diversidad de productos, desde herramientas manuales y eléctricas hasta materiales de plomería, pinturas, productos de jardinería y mucho más. Nos esforzamos por mantener un stock variado y actualizado, para que encuentres todo lo que necesitas en un solo lugar. Ya sea que estés realizando un proyecto de bricolaje en casa o trabajando en un gran proyecto de construcción, contamos con los productos adecuados para satisfacer tus necesidades. Explora nuestro catálogo en línea o visítanos en nuestra tienda física para descubrir las marcas y productos que tenemos disponibles. Nuestro objetivo es brindarte soluciones confiables y duraderas para que puedas llevar a cabo tus proyectos con éxito.
          </p>
        </div>

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="../../img/marcas/truper.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="../../img/marcas/FANAL.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="../../img/marcas/DeWalt.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="../../img/marcas/comex.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="../../img/marcas/Cemex.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="../../img/marcas/urrea.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Marcas Section -->


      <div class="container" data-aos="fade-up" style="margin-top:15px;">

        <div class="section-title">
          <h2>Productos disponibles</h2>
        </div>

        <div class="row content">
  <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php 
        $buscardor=mysqli_query($conexion,"SELECT * FROM productos"); 
        while($resultado = mysqli_fetch_assoc($buscardor)){ 
        ?>
     
        <div id="mi_div" class="col-4">
            <div class="card shadow-sm">
              
              <img src="../../img/productos/stock/<?php echo $resultado["id_img"]; ?>.jpg" alt="">
          
              <div class="card-body">
                
                
                <div class="d-flex justify-content-between align-items-center">
                <div>
              <p style="color:blue; font-size: larger; text-align: center;"><?php echo $resultado["nombre_producto"]; ?></p>
              </div>

              <div>
              <small style="color:red; font-size: large;">$ <?php echo $resultado["precio_individual"]; ?></small>
              </div>
                  <div class="btn-group">
                    <input name="cantidad" type="hidden" id="cantidad<?php echo $resultado["id_producto"]; ?>" value="1" class="pl-2" />
                  </div>
                  
                  
                  

</div><p class="card-text"><?php echo $resultado["descripcion"]; ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
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
              <li><i class="bx bx-chevron-right"></i> <a href="../../antecedentes.html">Antecedentes</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../aplicacion/registro.php">Registrarse</a></li>
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

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../diseno/vendor/aos/aos.js"></script>
  <script src="../../diseno/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../diseno/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../diseno/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../diseno/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../diseno/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="../../diseno/js/main.js"></script>
  

</body>

</html>