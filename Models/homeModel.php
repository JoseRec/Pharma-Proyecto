<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Models/connect.php';
function ValidarInicioSesionModel($correo, $contrasenna)
{
    try {
        $context = OpenDb();
        $sp = "CALL ValidarInicioSesion('$correo', '$contrasenna')";
        $respuesta = $context->query($sp);

        CloseDb($context);
        return $respuesta;

    } catch (Exception $error) {
        echo "Error: " . $error->getMessage();
        return null;
    }
}

function RegistrarUsuarioModel($nombre, $correo, $identificacion, $telefono, $contrasenna)
{
    try {
        $context = OpenDb();
        $sp = "CALL RegistrarUsuario('$nombre', '$correo', '$identificacion', '$telefono', '$contrasenna')";
        $respuesta = $context->query($sp);
        CloseDb($context);

        return $respuesta;
    } catch (Exception $error) {
        echo "Error: " . $error->getMessage();
        return false;
    }
}

function ValidarCorreoSesionModel($correo)
{
    try {
        $context = OpenDb();

        $sp = "CALL ValidarCorreo('$correo')";
        $respuesta = $context->query($sp);

        
        CloseDb($context);

        return $respuesta;
    } catch (Exception $error) {
        echo "Error: " . $error->getMessage();
        return false;
    }
}

function ValidarIdentificacionSesionModel($identificacion)
{
    try {
        $context = OpenDb();

        $sp = "CALL ValidarIdentificacion('$identificacion')";
        $respuesta = $context->query($sp);

        
        CloseDb($context);

        return $respuesta;
    } catch (Exception $error) {
        echo "Error: " . $error->getMessage();
        return false;
    }
}

function AcutalizarContrasennaModel($idUsuario, $contrasenna)
{
    try {
        $context = OpenDb();

        $sp = "CALL ActualizarContrasenna('$idUsuario', '$contrasenna')";
        $respuesta = $context->query($sp);

        CloseDb($context);
        return $respuesta;
    } catch (Exception $error) {
        echo "Error: " . $error->getMessage();
        return false;
    }
}
?>