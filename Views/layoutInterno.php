<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/homeController.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function showHeader()
{
    $nombre = $_SESSION['Nombre']; // Ya que sí o sí está logueado

    echo '
    <div class="site-wrap">
      <div class="site-navbar py-2">
        <div class="search-wrap">
          <div class="container">
            <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
            <form action="#" method="post">
              <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
            </form>
          </div>
        </div>

        <div class="container">
          <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
              <div class="site-logo">
                <a href="Principal.php" class="js-logo-clone">Pharma</a>
              </div>
            </div>
            <div class="main-nav d-none d-lg-block">
              <nav class="site-navigation text-right text-md-center" role="navigation">
                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="active"><a href="index.html">Home</a></li>
                  <li><a href="shop.html">Store</a></li>
                  <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown">
                      <li><a href="#">Supplements</a></li>
                      <li class="has-children">
                        <a href="#">Vitamins</a>
                        <ul class="dropdown">
                          <li><a href="#">Supplements</a></li>
                          <li><a href="#">Vitamins</a></li>
                          <li><a href="#">Diet &amp; Nutrition</a></li>
                          <li><a href="#">Tea &amp; Coffee</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Diet &amp; Nutrition</a></li>
                      <li><a href="#">Tea &amp; Coffee</a></li>
                    </ul>
                  </li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="../Contacto/contacto.php">Contact</a></li>
                </ul>
              </nav>
            </div>

            <div class="icons">
              <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
              <a href="cart.html" class="icons-btn d-inline-block bag">
                <span class="icon-shopping-bag"></span>
                <span class="number">2</span>
              </a>

              <!-- Menú desplegable del usuario -->
              <div class="dropdown d-inline-block">
                <a href="#" class="icons-btn dropdown-toggle" id="cuentaMenu"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="d-none d-lg-inline ml-1">' . $nombre . '</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cuentaMenu">
                    <a class="dropdown-item" href="../Usuarios/consultarPerfil.php">Actualizar perfil</a>
                    <a class="dropdown-item" href="../Usuarios/Reset.php">Cambiar contraseña</a>
                    <div class="dropdown-divider"></div>
                    <form class="form-horizontal" action="" method="POST" style="margin: 0; padding: 0;">
                    <button id="btnCerrarSesion" name="btnCerrarSesion" type="submit"
                        class="dropdown-item" style="cursor: pointer; width: 100%; text-align: left;">
                        <i class="fa fa-sign-out mr-2"></i> Cerrar Sesión
                    </button>
                    </form>
                </div>
              </div>
              <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none">
                <span class="icon-menu"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    ';
}

function showTestimonio()
{
    echo
        '
        <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Testimonios</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 no-direction owl-carousel">

                        <div class="testimony">
                            <blockquote>
                                <img src="../Imagenes/person_1.jpg" alt="Image"
                                    class="img-fluid w-25 mb-4 rounded-circle">
                                <p>&ldquo;El equipo superó mis expectativas. Su compromiso y profesionalismo fueron
                                    increíbles. Recomiendo ampliamente sus servicios a cualquiera que busque calidad
                                    y confianza.&rdquo;</p>
                            </blockquote>
                            <p>&mdash; Kelly Holmes</p>
                        </div>

                        <div class="testimony">
                            <blockquote>
                                <img src="../Imagenes/person_2.jpg" alt="Image"
                                    class="img-fluid w-25 mb-4 rounded-circle">
                                <p>&ldquo;Trabajar con ellos fue una experiencia fantástica. Escucharon nuestras
                                    necesidades y cumplieron con todo en tiempo y forma. Estoy muy feliz con el
                                    resultado final.&rdquo;</p>
                            </blockquote>
                            <p>&mdash; Jorge Morando</p>
                        </div>

                        <div class="testimony">
                            <blockquote>
                                <img src="../Imagenes/person_3.jpg" alt="Image"
                                    class="img-fluid w-25 mb-4 rounded-circle">
                                <p>&ldquo;Su atención al detalle y compromiso con la excelencia los distingue. Cada
                                    interacción fue personalizada y siempre se aseguraron de mantenernos informados
                                    y satisfechos.&rdquo;</p>
                            </blockquote>
                            <p>&mdash; Lucas Gallone</p>
                        </div>

                        <div class="testimony">
                            <blockquote>
                                <img src="../Imagenes/person_4.jpg" alt="Image"
                                    class="img-fluid w-25 mb-4 rounded-circle">
                                <p>&ldquo;Desde el inicio hasta el final, el equipo fue atento y servicial. Se
                                    notaba que les importaba nuestro éxito, y eso marcó toda la diferencia.&rdquo;
                                </p>
                            </blockquote>
                            <p>&mdash; Andrew Neel</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        ';
}

function showFooter()
{
    echo
        '
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                        <div class="block-7">
                            <h3 class="footer-heading mb-4">About Us</h3>
                            <p>En Farmacia Salud y Bienestar, nos dedicamos a ofrecer productos de alta calidad y un
                                servicio al cliente excepcional
                                para apoyar tus necesidades de salud. Nuestro equipo se compromete a brindarte
                                soluciones confiables y accesibles, a
                                segurando tu satisfacción y bienestar en cada paso.</p>
                        </div>

                    </div>
                    <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Suplementos</a></li>
                            <li><a href="#">Vitaminas</a></li>
                            <li><a href="#">Dietas &amp; Nutricion</a></li>
                            <li><a href="#">Té &amp; Café</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Contact Info</h3>
                            <ul class="list-unstyled">
                                <li class="address">WWM9+V5F, C. 8, San José, Paso De La Vaca</li>
                                <li class="phone"><a href="tel://50687422212">+506 8742 2212</a></li>
                                <li class="email">pharmaPaginaWeb@domain.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        ';
}

function showBannerFinal()
{
    ?>
    <div class="site-section bg-secondary bg-image" style="background-image: url('../Imagenes/bg_2.jpg');">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('../Imagenes/bg_1.jpg');">
                        <div class="banner-1-inner align-self-center">
                            <h2>Productos Farmacéuticos</h2>
                            <p>Ofrecemos una amplia gama de productos farmacéuticos de alta calidad, diseñados para mejorar
                                tu salud y bienestar con total confianza.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('../Imagenes/bg_2.jpg');">
                        <div class="banner-1-inner ml-auto align-self-center">
                            <h2>Calificados por Expertos</h2>
                            <p>Nuestros productos y servicios han sido evaluados y recomendados por profesionales del
                                sector, garantizando calidad y eficacia comprobada.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
}


function AddHead()
{
    echo
        '
    <head>
    <title>Pharma &mdash; Colorlib Template</title>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="../Estilos/icomoon/style.css">
    <link rel="stylesheet" href="../Estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../Estilos/magnific-popup.css">
    <link rel="stylesheet" href="../Estilos/jquery-ui.css">
    <link rel="stylesheet" href="../Estilos/owl.carousel.min.css">
    <link rel="stylesheet" href="../Estilos/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Estilos/aos.css">
    <link rel="stylesheet" href="../Estilos/style.css">
    </head>
        ';
}

function AddJs()
{
    echo
        '
    <script src="../Funciones/jquery-3.3.1.min.js"></script>
    <script src="../Funciones/jquery-ui.js"></script>
    <script src="../Funciones/popper.min.js"></script>
    <script src="../Funciones/bootstrap.min.js"></script>
    <script src="../Funciones/owl.carousel.min.js"></script>
    <script src="../Funciones/jquery.magnific-popup.min.js"></script>
    <script src="../Funciones/aos.js"></script>
    <script src="../Funciones/main.js"></script>
    ';
}
?>