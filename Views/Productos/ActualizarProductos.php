<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutInterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/productosController.php';

$idProducto = $_GET["q"];
$resultado = ConsultarInfoProducto($idProducto);
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
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Actualizar Productos</h4>
                            </div>
                            <hr>
                            <form class="form-horizontal p-4" action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <?php if (isset($_POST["txtMensaje"])): ?>
                                        <div class="alert alert-warning text-center"><?php echo $_POST["txtMensaje"]; ?>
                                        </div>
                                    <?php endif; ?>

                                    <input id="txtId" name="txtId" type="hidden" class="form-control"
                                        value="<?php echo $resultado["idProducto"] ?>">
                                    <input type="hidden" name="txtImagenActual"
                                        value="<?php echo $resultado["Imagen"]; ?>">

                                    <div class="form-group row">
                                        <label for="txtNombre"
                                            class="col-sm-3 col-form-label text-right font-weight-bold">Nombre</label>
                                        <div class="col-sm-8">
                                            <input id="txtNombre" name="txtNombre" type="text" class="form-control"
                                                value="<?php echo $resultado["Nombre"] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="txtDescripcion"
                                            class="col-sm-3 col-form-label text-right font-weight-bold">Descripción</label>
                                        <div class="col-sm-8">
                                            <textarea id="txtDescripcion" name="txtDescripcion" class="form-control"
                                                rows="4" required><?php echo $resultado["Descripcion"] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="txtPrecio"
                                            class="col-sm-3 col-form-label text-right font-weight-bold">Precio</label>
                                        <div class="col-sm-3">
                                            <input id="txtPrecio" name="txtPrecio" maxlength="10" type="text"
                                                class="form-control" onkeypress="permitirSoloNumeros()"
                                                value="<?php echo $resultado["Precio"] ?>" required>
                                        </div>

                                        <label for="txtCantidad"
                                            class="col-sm-2 col-form-label text-right font-weight-bold">Cantidad</label>
                                        <div class="col-sm-3">
                                            <input id="txtCantidad" name="txtCantidad" maxlength="5" type="text"
                                                class="form-control" onkeypress="permitirSoloNumeros()"
                                                value="<?php echo $resultado["Stock"] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="txtImagen"
                                            class="col-sm-3 col-form-label text-right font-weight-bold">Nueva
                                            Imagen</label>
                                        <div class="col-sm-3">
                                            <input id="txtImagen" name="txtImagen" type="file" accept="image/png"
                                                class="form-control-file">
                                            <small class="form-text text-muted">Formato PNG recomendado</small>
                                        </div>

                                        <label class="col-sm-2 col-form-label text-right font-weight-bold">Imagen
                                            Actual</label>
                                        <div class="col-sm-3 text-center">
                                            <img src="<?php echo $resultado["Imagen"]; ?>" alt="Imagen actual"
                                                class="img-fluid rounded shadow-sm" style="max-width: 180px;">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-sm-4 text-right">
                                            <button id="btnActualizarProducto" name="btnActualizarProducto"
                                                class="btn btn-primary px-5" type="submit">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        showFooter();
        ?>
    </div>
    </div>
    <?php
    AddJs();
    ?>
</body>

</html>