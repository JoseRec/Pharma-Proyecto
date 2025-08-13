<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Models/carritoModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["Accion"]) && $_POST["Accion"] === "AgregarCarrito" && isset($_POST["idProducto"])) {
    AgregarCarrito($_POST["idProducto"]);
}


function AgregarCarrito($idProducto)
{
    $idUsuario = $_SESSION["idUsuario"];
    $IdProducto = $idProducto;

    $respuesta = AgregarCarritoModel($idUsuario, $IdProducto);

    if ($respuesta) {
        echo "ok";
    } else {
        echo "El producto no fue agregado a su carrito.";
    }
}

function ConsultarCarrito()
{
    return ConsultarCarritoModel($_SESSION["idUsuario"]);
}

function ConsultarResumenCarrito()
{
    $idUsuario = $_SESSION["idUsuario"];
    $respuesta = ConsultarResumenCarritoModel($idUsuario);

    if ($respuesta != null && $respuesta->num_rows > 0) {
        $datos = mysqli_fetch_array($respuesta);
        $_SESSION["Total"] = $datos["Total"];
        $_SESSION["Cantidad"] = $datos["Cantidad"];
    }

}

if (isset($_POST["Accion"]) && $_POST["Accion"] == "EliminarProductoCarrito") {
    EliminarProductoCarrito($_POST["idProducto"]);
}

function EliminarProductoCarrito($idProducto)
{
    $idUsuario = $_SESSION["idUsuario"];
    $IdProducto = $idProducto;

    $respuesta = EliminarProductoCarritoModel($idUsuario, $IdProducto);

    if ($respuesta) {
        ConsultarResumenCarrito();
        echo "OK";
    } else {
        echo "El producto no fue eliminado de su carrito.";
    }
}


if (isset($_POST["Accion"]) && $_POST["Accion"] == "EliminarUnidadCarrito") {
    EliminarUnidadCarrito($_POST["idProducto"]);
}

function EliminarUnidadCarrito($idProducto)
{
    $idUsuario = $_SESSION["idUsuario"];
    $IdProducto = $idProducto;

    $respuesta = EliminarUnidadCarritoModel($idUsuario, $IdProducto);

    if ($respuesta) {
        ConsultarResumenCarrito();
        echo "ok";
    } else {
        echo "El producto no fue eliminado de su carrito.";
    }
}

?>