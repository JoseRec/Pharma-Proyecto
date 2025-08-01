<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Models/homeModel.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Controllers/utilitariosController.php';

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (isset($_POST["btnIniciarSesion"])) {

    $correo = $_POST["txtEmail"];
    $contrasenna = $_POST["txtContrasenna"];

    $respuesta = ValidarInicioSesionModel($correo, $contrasenna);

    if ($respuesta != null && $respuesta -> num_rows > 0) {

        $datos = mysqli_fetch_array($respuesta);

        $_SESSION["Nombre"] = $datos["Nombre"];
        $_SESSION["idUsuario"] = $datos["idUsuario"];
        $_SESSION["Contrasenna"] = $datos["Contrasenna"];
        $_SESSION["Rol_Fk"] = $datos["Rol_Fk"];
        $_SESSION["Telefono"] = $datos["Telefono"];
        $_SESSION["RolNombre"] = $datos["RolNombre"];

        header("location: ../../Views/Home/principal.php");
    } else {
        $_POST["txtMensaje"] = "Su información es incorrecta.";
    }
}

if (isset($_POST["btnRegistrarUsuario"])) {
    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $identificacion = $_POST["txtCedula"];
    $telefono = $_POST["txtTelefono"];
    $contrasenna = $_POST["txtContrasenna"];
    $confirmarContrasenna = $_POST["txtConfirmar"];


    $correoValido = ValidarCorreoSesionModel($correo);
    if ($correoValido != null && $correoValido->num_rows > 0) {
        $_POST["txtMensaje"] = "El correo ya se encuentra registrado. Por favor, utilice otro.";
        return;
    }

    $identificacionValida = ValidarIdentificacionSesionModel($identificacion);
    if ($identificacionValida != null && $identificacionValida->num_rows > 0) {
        $_POST["txtMensaje"] = "La identificación ya se encuentra registrada.";
        return;
    }

    if ($contrasenna != $confirmarContrasenna) {
        $_POST["txtMensaje"] = "Las contraseñas no coinciden.";
        return;;
    }

    $respuesta2 = RegistrarUsuarioModel($nombre, $correo, $identificacion,$telefono ,$contrasenna);

    if ($respuesta2) {
        header("location: ../../Views/Home/login.php");
    } else {
        $_POST["txtMensaje"] = "Su información no fue registrada correctamente.";
    }
}

if (isset($_POST["btnRecuperarAcceso"])) {
    $correo = $_POST["txtCorreo"];
    $respuesta = ValidarCorreoSesionModel($correo);
    if ($respuesta != null && $respuesta->num_rows > 0) {
        $datos = mysqli_fetch_array($respuesta);
        $contrasenna = generarContrasena();
        $respuestaActualizacion = AcutalizarContrasennaModel($datos["idUsuario"], $contrasenna);
        if ($respuestaActualizacion) {
            $mensaje = "<html><body>
                Estimado(a) " . $datos["Nombre"] . "<br><br>
                Se ha generado el siguiente código de seguridad: <strong>" . $contrasenna . "</strong><br>
                Recuerde realizar el cambio de contraseña una vez que ingrese al sistema.
                </body></html>";
            $respuestaCorreo = EnviarCorreo("Recuperación de acceso", $mensaje, $correo);
            if ($respuestaCorreo) {
                header("location: ../../Views/Home/login.php");
            } else {
                $_POST["txtMensaje"] = "No se pudo enviar el correo.";
            }
        }
    } else {
        $_POST["txtMensaje"] = "Correo no encontrado en el sistema.";
    }
}

if (isset($_POST["btnEnviarMensaje"])) {
    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $asunto = $_POST["txtAsunto"];
    $texto = $_POST["txtMensaje"];


    $mensaje = "<html><body>
    <strong>Nombre:</strong> $nombre <br>
    <strong>Correo:</strong> $correo <br><br>
    <strong>Mensaje:</strong><br>
    <p>$texto</p>
    </body></html>";
    
    $direccionCorreo = "xxxxxxxxxxxxxxxxxx"; //Agregar aqui el correo al que se enviará el mensaje, este tiene que ser por ejemplo administrativo creo
    $respuestaCorreo = EnviarCorreo($asunto, $mensaje, $direccionCorreo);

    if ($respuestaCorreo) {
        $_POST["txtMensaje"] = "Mensaje enviado";
    } else {
        $_POST["txtMensaje"] = "Error al enviar el mensaje";
    }
}

if (isset($_POST["btnCerrarSesion"])) {
     session_destroy();
    header("location: ../../Views/Home/login.php");
}
?>