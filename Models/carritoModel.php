<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Models/connect.php';
function AgregarCarritoModel($idUsuario, $idProducto)
{
    try {
        $context = OpenDB();

        $sp = "CALL AgregarCarrito('$idUsuario', '$idProducto')";
        $respuesta = $context->query($sp);

        CloseDB($context);
        return $respuesta;
    } catch (Exception $error) {
        echo "Error: " . $error->getMessage();
        return false;
    }
}

function ConsultarCarritoModel($idUsuario)
{
    try {
        $context = OpenDb();

        $sp = "CALL ConsultarCarrito('$idUsuario')";
        $respuesta = $context->query($sp);


        CloseDb($context);

        return $respuesta;
    } catch (Exception $error) {
        echo "Error: " . $error->getMessage();
        return false;
    }
}

function ConsultarResumenCarritoModel($idUsuario)
{
    try {
        $context = OpenDB();

        $sp = "CALL ConsultarResumenCarrito('$idUsuario')";
        $respuesta = $context->query($sp);

        CloseDB($context);
        return $respuesta;
    } catch (Exception $error) {
        RegistrarError($error);
        return null;
    }
}

function EliminarProductoCarritoModel($IdUsuario, $IdProducto)
{
    try {
        $context = OpenDB();

        $sp = "CALL EliminarProductoCarrito('$IdUsuario', '$IdProducto')";
        $respuesta = $context->query($sp);

        CloseDB($context);
        return $respuesta;
    } catch (Exception $error) {
        echo "Error: " . $error->getMessage();
        return false;
    }
}

function EliminarUnidadCarritoModel($idUsuario, $idProducto)
{
    try {
        $context = OpenDB();

        $sp = "CALL EliminarUnidadCarrito('$idUsuario', '$idProducto')";
        $respuesta = $context->query($sp);

        CloseDB($context);
        return $respuesta;
    } catch (Exception $error) {
        echo "Error: " . $error->getMessage();
        return false;
    }
}

?>