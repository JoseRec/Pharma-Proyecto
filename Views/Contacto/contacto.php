<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutInterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/homeController.php';
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
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="../Home/principal.php">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Contacto</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-5 text-black">Contáctanos</h2>
                </div>
                <div class="col-md-12">
                    <?php
                    if (isset($_POST["txtMensajeAlerta"])) {
                        echo '<div class="alert alert-warning text-center">' . $_POST["txtMensajeAlerta"] . '</div>';
                    }
                    ?>
                    <form action="" method="POST">
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="txtNombre" class="text-black">Nombre completo <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="txtCorreo" class="text-black">Correo electrónico <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="txtAsunto" class="text-black">Asunto</label>
                                    <input type="text" class="form-control" id="txtAsunto" name="txtAsunto" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="txtMensaje" class="text-black">Mensaje</label>
                                    <textarea class="form-control" id="txtMensaje" name="txtMensaje" rows="8"
                                        placeholder="Escriba su mensaje aquí..."></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="btnEnviarMensaje" name="btnEnviarMensaje">
                                        Enviar Mensaje
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
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
</body>

</html>