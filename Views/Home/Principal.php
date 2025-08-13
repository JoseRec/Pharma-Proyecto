<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutInterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/productosController.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/carritoController.php';

ConsultarResumenCarrito();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
AddHead();
?>

<body>
    <?php
    showHeader();
    ?>
    <div class="site-blocks-cover" style="background-image: url('../Imagenes/hero_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                    <div class="site-block-cover-content text-center">
                        <h2 class="sub-title">Medicina efectiva</h2>
                        <h1>Bienvenidos a Pharma</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-stretch section-overlap">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap bg-primary h-100 p-4 rounded-lg shadow-sm hover-shadow"
                        style="background-color: #00bcd4;">
                        <a href="#" class="h-100 text-white d-flex flex-column justify-content-center text-center">
                            <div class="icon mb-3">
                                <i class="fas fa-truck-medical fa-2x"></i>
                            </div>
                            <h3 class="font-weight-bold mb-3">Envío Gratis</h3>
                            <p class="mb-0">
                                En pedidos superiores a $50
                                <strong class="d-block mt-2">Recibe tus medicamentos y productos de salud a
                                    domicilio, de manera segura y sin costo adicional.</strong>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap h-100 p-4 rounded-lg shadow-sm hover-shadow"
                        style="background: linear-gradient(135deg, #4db6ac, #00695c);">
                        <a href="#" class="h-100 text-white d-flex flex-column justify-content-center text-center">
                            <div class="icon mb-3">
                                <i class="fas fa-capsules fa-2x"></i>
                            </div>
                            <h3 class="font-weight-bold mb-3">Ofertas Saludables</h3>
                            <p class="mb-0">
                                Hasta 40% OFF
                                <strong class="d-block mt-2">Aprovecha descuentos exclusivos en vitaminas,
                                    suplementos y productos de cuidado personal.</strong>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap h-100 p-4 rounded-lg shadow-sm hover-shadow"
                        style="background-color: #1565c0;">
                        <a href="#" class="h-100 text-white d-flex flex-column justify-content-center text-center">
                            <div class="icon mb-3">
                                <i class="fas fa-gift fa-2x"></i>
                            </div>
                            <h3 class="font-weight-bold mb-3">Tarjetas Regalo</h3>
                            <p class="mb-0">
                                Cuida a los tuyos
                                <strong class="d-block mt-2">Regala bienestar y salud con nuestras tarjetas de
                                    regalo, válidas para medicamentos y más.</strong>
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    showTestimonio();
    ?>
    <?php
    showBannerFinal();
    ?>
    <?php
    showFooter();
    ?>
    </div>
    <?php
    AddJs();
    ?>
</body>
</html>