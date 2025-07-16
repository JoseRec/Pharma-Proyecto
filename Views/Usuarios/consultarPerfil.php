<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutInterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/usuarioController.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$idUsuario = $_SESSION["idUsuario"];
$resultado = ConsultarInfoUsuario($idUsuario);
?>

<!DOCTYPE html>
<html>

<?php
AddHead()
    ?>

<body>
    <div class="site-section bg-light">
        <div class="container">
            <div class="container mt-4">
                <a href="../Home/Principal.php" class="text-dark d-inline-flex align-items-center" style="text-decoration: none;">
                    <span class="icon-chevron-left mr-2" style="font-size: 24px;"></span>
                    <strong>Volver a inicio</strong>
                </a>
            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <h2 class="text-uppercase">Perfil de Usuario</h2>
                    <p class="lead">Consulta o actualiza tu información personal</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="p-4 rounded-lg shadow-sm bg-white">
                        <?php
                        if (isset($_POST["txtMensaje"])) {
                            echo '<div class="alert alert-warning text-center">' . $_POST["txtMensaje"] . '</div>';
                        }
                        ?>
                        <form method="POST">
                            <div class="form-group">
                                <label for="txtIdentificacion">Identificación</label>
                                <input id="txtIdentificacion" name="txtIdentificacion" type="text" class="form-control"
                                    value="<?php echo $resultado['Identificacion']; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="txtNombre">Nombre</label>
                                <input id="txtNombre" name="txtNombre" type="text" class="form-control"
                                    value="<?php echo $resultado['Nombre']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="txtCorreo">Correo</label>
                                <input id="txtCorreo" name="txtCorreo" type="email" class="form-control"
                                    value="<?php echo $resultado['Correo']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="txtTelefono">Teléfono</label>
                                <input id="txtTelefono" name="txtTelefono" type="text" class="form-control"
                                    value="<?php echo $resultado['Telefono']; ?>">
                            </div>

                            <div class="text-right mt-4">
                                <button type="submit" id="btnActualizarPerfilUsuario" name="btnActualizarPerfilUsuario"
                                    class="btn btn-primary px-4 py-2">
                                    Actualizar Perfil
                                </button>
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
    <?php
    AddJs();
    ?>
</body>

</html>