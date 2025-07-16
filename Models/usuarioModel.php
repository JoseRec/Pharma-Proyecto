1<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . '/Pharma Proyecto/Models/connect.php';
    function ConsultarInfoUsuarioModel($idUsuario)
    {
        try
        {
            $context = OpenDB();
            $sp = "CALL ConsultarInfoUsuario('$idUsuario')";
            $respuesta = $context -> query($sp);
            CloseDB($context);            
            return $respuesta;
        }
        catch(Exception $error)
        {
            echo "Error: " . $error->getMessage();
            return null;
        }
    }

    function ActualizarPerfilUsuarioModel($idUsuario,$nombre, $correo, $telefono)
    {
        try {
            $context = OpenDb();
            $sp = "CALL ActualizarPerfilUsuario('$idUsuario', '$nombre', '$correo', '$telefono')";
            $respuesta = $context->query($sp);


            CloseDb($context);
            return $respuesta;
        } catch (Exception $error) {
            echo "Error: " . $error->getMessage();
            return false;
        }
    }
?>