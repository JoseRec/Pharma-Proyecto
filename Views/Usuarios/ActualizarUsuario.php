<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/layoutInterno.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/usuarioController.php';

$idUsuario = $_GET["q"];
$resultado = ConsultarInfoUsuario($idUsuario);
$rolesSistema = ConsultarRoles();
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
                                <h4 class="card-title">Actualizar Usuarios</h4>
                            </div>
                            <hr>
                            <form class="form-horizontal px-4 pt-3 pb-4" action="" method="POST"
                                enctype="multipart/form-data">
                                <div class="card-body bg-light rounded shadow-sm">

                                    <?php if (isset($_POST["txtMensaje"])): ?>
                                        <div class="alert alert-warning text-center"><?php echo $_POST["txtMensaje"]; ?>
                                        </div>
                                    <?php endif; ?>

                                    <input id="txtIdUsuario" name="txtIdUsuario" type="hidden"
                                        value="<?php echo $resultado["idUsuario"]; ?>">

                                    <div class="form-row mb-3">
                                        <div class="col-md-6">
                                            <label for="txtIdentificacion"
                                                class="font-weight-bold">Identificación</label>
                                            <input id="txtIdentificacion" name="txtIdentificacion" type="text"
                                                class="form-control form-control-sm"
                                                value="<?php echo $resultado["Identificacion"]; ?>"
                                                onkeyup="consultarNombre()">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txtNombre" class="font-weight-bold">Nombre</label>
                                            <input id="txtNombre" name="txtNombre" type="text"
                                                class="form-control form-control-sm"
                                                value="<?php echo $resultado["Nombre"]; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-md-6">
                                            <label for="txtCorreo" class="font-weight-bold">Correo</label>
                                            <input id="txtCorreo" name="txtCorreo" type="email"
                                                class="form-control form-control-sm"
                                                value="<?php echo $resultado["Correo"]; ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txtTelefono" class="font-weight-bold">Teléfono</label>
                                            <input id="txtTelefono" name="txtTelefono" type="text"
                                                class="form-control form-control-sm"
                                                value="<?php echo $resultado["Telefono"]; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">

                                        <div class="col-md-6">
                                            <label for="listaRoles" class="font-weight-bold">Rol del Sistema</label>
                                            <select id="listaRoles" name="listaRoles"
                                                class="form-control form-control-sm w-75">
                                                <?php  
                                                    While($fila = mysqli_fetch_array($rolesSistema))
                                                    {
                                                        if($resultado["idRol"] == $fila["idRol"])
                                                        {
                                                            echo "<option selected value=". $fila["idRol"] .">" . $fila["RolNombre"] . "</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value=". $fila["idRol"] .">" . $fila["RolNombre"] . "</option>";
                                                        }   
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mt-4">
                                        <div class="col text-right">
                                            <button id="btnActualizarDatosUsuario" name="btnActualizarDatosUsuario"
                                                class="btn btn-info px-4" type="submit">Procesar</button>
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