<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Models/productoModel.php';


function ConsultarProductos($Filtro)
{
    return $respuesta = ConsultarProductosModel($Filtro);
}

if (isset($_POST["btnRegistrarProducto"])) {

    $nombre = $_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    $precio = $_POST["txtPrecio"];
    $stock = $_POST["txtCantidad"];
    $imagen = "/Pharma Proyecto/Views/ImagenesProductos/" . $_FILES["txtImagen"]["name"]; //Ruta donde se guardará la imagen

    $origen = $_FILES["txtImagen"]["tmp_name"]; //Donde se encuentra la imagen temporalmente
    $destino = $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Views/ImagenesProductos/' . $_FILES["txtImagen"]["name"]; //Ruta donde se guardará la imagen
    copy($origen, $destino); // Copiamos la imagen a la ruta destino


    // Enviamos el nombre de usuario y la contraseña al modelo
    $respuesta = RegistrarProductoModel($nombre, $descripcion, $precio, $stock, $imagen);

    if ($respuesta) {
        header("location: ../../Views/Productos/consultarProductos.php");
    } else {
        $_POST["txtMensaje"] = "Su producto no fue registrada correctamente.";
    }
}

if (isset($_POST["btnCambiarEstadoProducto"])) {
    $idProducto = $_POST["IdProducto"];

    $respuesta = CambiarEstadoProductoModel($idProducto);

    if ($respuesta) {
        header("location: ../../Views/Productos/consultarProductos.php");
    } else {
        $_POST["txtMensaje"] = "El producto no fue actualizado correctamente.";
    }
}

function ConsultarInfoProducto($idProducto)
{
    $respuesta = ConsultarInfoProductoModel($idProducto);

    if ($respuesta != null && $respuesta->num_rows > 0) {
        return mysqli_fetch_array($respuesta);
    }
}

if (isset($_POST["btnActualizarProducto"])) {
    $idProducto = $_POST["txtId"];
    $nombre = $_POST["txtNombre"];
    $descripcion = $_POST["txtDescripcion"];
    $precio = $_POST["txtPrecio"];
    $cantidad = $_POST["txtCantidad"];
    $imagen = "";

    $imagen = $_POST["txtImagenActual"]; // Por defecto, usar la imagen actual

    if ($_FILES["txtImagen"]["name"] != "") {
        $imagen = '/Pharma Proyecto/Views/ImagenesProductos/' . $_FILES["txtImagen"]["name"];

        $origen = $_FILES["txtImagen"]["tmp_name"];
        $destino = $_SERVER["DOCUMENT_ROOT"] . $imagen;
        copy($origen, $destino);
    }

    $respuesta = ActualizarProductoModel($idProducto, $nombre, $descripcion, $precio, $cantidad, $imagen);

    if ($respuesta) {
        header("location: ../../Views/Productos/ConsultarProductos.php");
    } else {
        $_POST["txtMensaje"] = "El producto no fue actualizado correctamente.";
    }
}
?>