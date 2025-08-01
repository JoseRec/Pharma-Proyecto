<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Models/homeModel.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Models/usuarioModel.php';

function ConsultarInfoUsuario($idUsuario)
{
    $respuesta = ConsultarInfoUsuarioModel($idUsuario);

    if ($respuesta != null && $respuesta->num_rows > 0) {
        return mysqli_fetch_array($respuesta);
    }
}

if (isset($_POST["btnActualizarPerfilUsuario"])) {
    $idUsuario = $_SESSION["idUsuario"];
    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $telefono = $_POST["txtTelefono"];

    $respuesta = ActualizarPerfilUsuarioModel($idUsuario, $nombre, $correo, $telefono);
    if ($respuesta) {
        $_SESSION["Nombre"] = $nombre;
        $_POST["txtMensaje"] = "Su información se actualizó correctamente.";
    } else {
        $_POST["txtMensaje"] = "Su información no fue actualizada correctamente.";
    }
}

if (isset($_POST["btnActualizarContrasenna"])) {
    $idUsuario = $_SESSION["idUsuario"];
    $contrasennaAnterior = $_POST["txtContrasennaAnterior"];
    $contrasennaNueva = $_POST["txtContrasennaNueva"];
    $confirmar = $_POST["txtConfirmar"];
    $contrasennaSesion = $_SESSION["Contrasenna"];

    if ($contrasennaSesion != $contrasennaAnterior) {
        $_POST["txtMensaje"] = "Valide su contraseña.";
        return;
    }

    if ($contrasennaNueva != $confirmar) {
        $_POST["txtMensaje"] = "Valide la confirmación de su contraseña nueva.";
        return;
    }

    $respuesta = AcutalizarContrasennaModel($idUsuario, $contrasennaNueva);

    if ($respuesta) {
        $_SESSION["Contrasenna"] = $contrasennaNueva;
        $_POST["txtMensaje"] = "Su contraseña se actualizó correctamente.";
    } else {
        $_POST["txtMensaje"] = "Su contraseña no fue actualizada correctamente.";
    }
}

function ConsultarUsuarios()
{
    return ConsultarUsuariosModel();
}

if (isset($_POST["btnCambiarEstadoUsuario"])) {
    $idUsuario = $_POST["idUsuario"];

    $respuesta = CambiarEstadoUsuarioModel($idUsuario);

    if ($respuesta) {
        header("location: ../../Views/Usuarios/ConsultarUsuarios.php");
    } else {
        $_POST["txtMensaje"] = "El usuario no fue actualizado correctamente.";
    }
}

function ConsultarRoles()
{
    return ConsultarRolesModel();
}

if (isset($_POST["btnActualizarDatosUsuario"])) {

    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $identificacion = $_POST["txtIdentificacion"];
    $idUsuario = $_POST["txtIdUsuario"];
    $listaRoles = $_POST["listaRoles"];

    // Enviamos el nombre de usuario y la contraseña al modelo
    $respuesta = ActualizarPerfilUsuarioModel($idUsuario, $nombre, $correo, $identificacion, $listaRoles);

    if ($respuesta) {
        $_SESSION["Nombre"] = $nombre;
        $_POST["txtMensaje"] = "Su información se actualizo correctamente.";
    } else {
        $_POST["txtMensaje"] = "Su información no fue registrada correctamente.";
    }
}
?>