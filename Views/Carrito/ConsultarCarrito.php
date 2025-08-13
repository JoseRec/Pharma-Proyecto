<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutInterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/carritoController.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ConsultarResumenCarrito();

$resultado = ConsultarCarrito();
?>

<!DOCTYPE html>
<html>
<?php
AddHead();
?>

<body>
    <div id="main-wrapper">

        <?php
        showHeader();
        ?>


        <?php
        // Inicializa totales
        $subtotalTotal = 0;
        $impuestoTotal = 0;
        $totalTotal = 0;
        ?>

        <section class="h-100 gradient-custom">
            <div class="container py-5">
                <div class="row d-flex justify-content-center my-4">

                    <!-- Lista de productos -->
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Tu carrito</h5>
                            </div>
                            <div class="card-body">

                                <?php while ($fila = mysqli_fetch_array($resultado)) {
                                    // Acumula los valores que vienen directo del SP
                                    $subtotalTotal += $fila['SubTotal'];
                                    $impuestoTotal += $fila['Impuesto'];
                                    $totalTotal += $fila['Total'];
                                    ?>

                                    <div class="row align-items-center mb-4">
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <div>
                                                <img class="card-img-top mt-3" src="<?php echo $fila['Imagen']; ?>"
                                                    style="height: 200px; object-fit: contain;"
                                                    alt="<?php echo $fila['Nombre']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                            <p><strong><?php echo $fila['Nombre']; ?></strong></p>
                                            <p><?php echo $fila['Descripcion']; ?></p>

                                            <a class="btn btnAbrirModal" data-toggle="modal"
                                                data-target="#EliminarProductoCarrito"
                                                data-id="<?php echo $fila['idProducto']; ?>"
                                                data-nombre="<?php echo $fila['Nombre']; ?>">
                                                <i class="icon-trash-o" style="font-size:1.5em; color:red;"></i>
                                            </a>



                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                            <div class="d-flex mb-3" style="max-width: 200px;">
                                                <button class="btn btn-primary px-3 me-2"
                                                    onclick="actualizarCantidad(this, <?php echo $fila['idProducto']; ?>, 'menos')"
                                                    type="button">
                                                    <i class="icon-minus"></i>
                                                </button>
                                                <input type="number" min="1" max="99"
                                                    value="<?php echo $fila['Cantidad']; ?>"
                                                    class="form-control text-center" style="max-width: 60px;" />
                                                <button class="btn btn-primary px-3 ms-2"
                                                    onclick="actualizarCantidad(this, <?php echo $fila['idProducto']; ?>, 'mas')"
                                                    type="button">
                                                    <i class="icon-plus"></i>
                                                </button>
                                            </div>
                                            <p class="text-md-center text-start">
                                                <strong>₡<?php echo number_format($fila['Precio'], 2); ?></strong>
                                            </p>
                                        </div>
                                    </div>
                                    <hr />
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- Resumen a la derecha -->
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Resumen</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Subtotal
                                        <span>₡<?php echo number_format($subtotalTotal, 2); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        Impuesto (13%)
                                        <span>₡<?php echo number_format($impuestoTotal, 2); ?></span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total a pagar</strong>
                                            <p class="mb-0">(IVA incluido)</p>
                                        </div>
                                        <span><strong>₡<?php echo number_format($totalTotal, 2); ?></strong></span>
                                    </li>
                                </ul>

                                <button type="submit" name="procesarPago" class="btn btn-primary btn-lg btn-block">
                                    Procesar pago
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        showFooter();
        ?>
    </div>
    </div>

    <div class="modal fade" id="EliminarProductoCarrito" tabindex="-1" role="dialog" aria-labelledby="tituloModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModal">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="idProducto" name="idProducto" class="form-control">
                    <Label id="lblNombre" name="lblNombre"></Label>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnEliminarProductoCarrito" name="btnEliminarProductoCarrito"
                        class="btn btn-primary"
                        onclick="EliminarProductoCarrito($('#idProducto').val())">Procesar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    AddJs();
    ?>

    <script>
        $(function () {
            new DataTable('#tablaDatos', {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json',
                },
            });

            $('.btnAbrirModal').on('click', function () {
                const id = $(this).data('id');
                const nombre = $(this).data('nombre');

                $('#idProducto').val(id);
                $('#lblNombre').text("¿Desea eliminar el producto " + nombre + " del carrito?");
            });

        });

        function EliminarProductoCarrito(idProducto) {

            $.ajax({
                url: "../../Controllers/carritoController.php",
                type: "POST",
                dataType: 'text',
                data: {
                    Accion: "EliminarProductoCarrito",
                    idProducto: idProducto
                },
                success: function (response) {
                    if (response == "OK") {
                        window.location.reload();
                    } else {
                        alert(response);
                    }
                }
            });
        }

        function actualizarCantidad(btn, idProducto, accion) {
            let input = btn.parentNode.querySelector('input[type=number]');

            if (accion === 'mas') {
                input.stepUp();
                AgregarCarrito(idProducto);
            } else if (accion === 'menos') {
                if (input.value > 1) {
                    input.stepDown();
                    EliminarUnidadCarrito(idProducto);
                }
            }
        }

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

        function EliminarUnidadCarrito(idProducto) {
            $.ajax({
                url: "../../Controllers/carritoController.php",
                type: "POST",
                dataType: 'text',
                data: {
                    Accion: "EliminarUnidadCarrito",
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