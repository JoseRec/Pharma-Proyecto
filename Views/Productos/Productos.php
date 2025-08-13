<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutInterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/productosController.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/carritoController.php';

ConsultarResumenCarrito();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$resultado = ConsultarProductos(1);
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

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Popular Products</h2>
                </div>
            </div>
            <div class="row">
                <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card h-100 d-flex flex-column shadow-sm border-0">
                            <img src="<?php echo $fila["Imagen"]; ?>" class="card-img-top"
                                style="height: 200px; object-fit: contain;">

                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title text-center"><?php echo $fila["Nombre"]; ?></h5>
                                    <p class="card-text text-center"><?php echo $fila["Descripcion"]; ?></p>
                                </div>

                                <div class="mt-auto text-center">
                                    <p class="text-primary font-weight-bold mb-2">$<?php echo $fila["Precio"]; ?></p>
                                    <button onclick="AgregarCarrito(<?php echo $fila['idProducto']; ?>)" class="btn w-60"
                                        style="background-color: #1565c0; color: white;">
                                        <span class="icon-add_shopping_cart"></span> Agregar al carrito
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
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
    <script>
        function AgregarCarrito(idProducto) {
            $.ajax({
                url: "../../Controllers/carritoController.php",
                type: "POST",
                dataType: 'text',
                data: {
                    Accion: "AgregarCarrito",
                    idProducto: idProducto
                },
                success: function (response) {
                    if (response == "ok") {
                        window.location.reload();
                    } else {
                        alert(response);
                    }
                }
            });
        }
    </script>
</body>
</html>